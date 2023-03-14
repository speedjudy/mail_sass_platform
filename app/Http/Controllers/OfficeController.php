<?php

namespace App\Http\Controllers;

use App\Mail\UserPasswordReset;
use App\Models\Activity;
use App\Models\ApiKey;
use App\Models\CalendarEvent;
use App\Models\Contact;
use App\Models\CreditCard;
use App\Models\Document;
use App\Models\MediaFile;
use App\Models\PaymentGateway;
use App\Models\Post;
use App\Models\QuickShare;
use App\Models\QuickShareAccessLog;
use App\Models\SubscriptionPlan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Workspace;
use App\Supports\DataHandler;
use DeviceDetector\DeviceDetector;
use Dompdf\Dompdf;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use OpenAI;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class OfficeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (it_is_a_saas()) {
            $post = Post::where('is_home_page', 1)
                ->first();
            $subscription_plans = SubscriptionPlan::listForSuperAdmin();
            return \view('website.home', [
                'post' => $post,
                'subscription_plans' => $subscription_plans,
            ]);
        }
        return redirect()->route('office.dashboard');
    }

    public function login()
    {
        return view('office.auth', [
            'type' => 'login',
            'page_title' => __('Login'),
        ]);
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            add_activity($this->workspace_id, __('Failed to login with email') . ':' . $request->email);
            return response([
                'errors' => [
                    'user' => __('Invalid email or password'),
                ],
            ], 422);
        }

        if (!$this->isDemo()) {
            if (!Hash::check($request->password, $user->password)) {
                return response([
                    'errors' => [
                        'password' => __('Invalid email or password'),
                    ],
                ], 422);
            }
        }

        session()->put('user_id', $user->id);

        $user->last_login_at = now();
        $user->save();

        add_activity($this->workspace_id, __('Logged in with email') . ':' . $request->email, $user->id);

        return response([
            'success' => true,
        ]);

    }

    public function mailApi(Request $request)
    {

       $this->authCheck();


      return view('office.mail-api', [
             'navigation' => 'settings',
                'page_title' => __('Mail API'),
                'page_subtitle' => __('Mail API Details'),
               'sub_navigation' => 'settings_api',
        ]);

    }

    public function viewItem(Request $request, $item, $uuid)
    {
        switch ($item) {
            case 'document':

                $request->validate([
                    'access_key' => 'required|string|max:36',
                ]);

                $document = Document::where('uuid', $uuid)->first();

                abort_unless($document, 404);

                if ($document->access_key != $request->access_key) {
                    abort(404);
                }

                return view('office.view.document', [
                    'document' => $document,
                    'page_title' => $document->title,
                ]);

                break;

            case 'file':

                $request->validate([
                    'access_key' => 'required|string|max:36',
                ]);

                $media_file = MediaFile::where('uuid', $uuid)->first();

                abort_unless($media_file, 404);

                abort_unless($media_file->access_key, 404);

                if ($media_file->access_key != $request->access_key) {
                    abort(404);
                }

                if($request->action == 'download'){

                    $file_path = base_path('uploads/' . $media_file->path);

                    $title = $media_file->title;
                    $extension = $media_file->extension;

                    //Remove extension from title
                    $title = str_replace('.' . $extension, '', $title);

                    $file_name = $title . '.' . $extension;

                    return response()->download($file_path, $file_name);
                }

                return view('office.view.shared-file', [
                    'media_file' => $media_file,
                    'page_title' => $media_file->title,
                ]);

                break;
        }
    }

    public function dashboard()
    {
        $this->authCheck();

        $recent_documents = Document::getRecentDocuments($this->workspace_id, 'word');

        // Recent Activities

        $activities = Activity::where('workspace_id', $this->workspace_id)
            ->orderBy('id', 'desc')
            ->limit(100)
            ->get();

        $activities_stats = [];

        foreach ($activities as $activity) {
            $date = Carbon::parse($activity->created_at)->format('Y-m-d');
            if (!isset($activities_stats[$date])) {
                $activities_stats[$date] = 0;
            }
            $activities_stats[$date]++;
        }

        $recent_contacts = Contact::where('workspace_id', $this->workspace_id)
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        $word_documents_count = Document::where('workspace_id', $this->workspace_id)
            ->where('type', 'word')
            ->count();

        $spreadsheet_documents_count = Document::where('workspace_id', $this->workspace_id)
            ->where('type', 'spreadsheet')
            ->count();


        return view('office.dashboard', [
            'navigation' => 'dashboard',
            'page_title' => __('Dashboard'),
            'recent_documents' => $recent_documents,
            'activities_stats' => $activities_stats,
            'recent_contacts' => $recent_contacts,
            'word_documents_count' => $word_documents_count,
            'spreadsheet_documents_count' => $spreadsheet_documents_count,
        ]);
    }

    public function documents()
    {
        $this->authCheck();

        $documents = Document::getForWorkspace($this->workspace_id, 'word');

        $recent_documents = Document::getRecentDocuments($this->workspace_id, 'word');

        return view('office.documents', [
            'navigation' => 'documents',
            'page_title' => __('Documents'),
            'page_subtitle' => __('Manage your documents'),
            'documents' => $documents,
            'recent_documents' => $recent_documents,
        ]);
    }

    public function document(Request $request)
    {
        $this->authCheck();
        $request->validate([
            'uuid' => 'required|uuid',
        ]);

        $document = Document::where('uuid', $request->uuid)
            ->where('workspace_id', $this->workspace_id)
            ->first();

        abort_unless($document, 404);

        $document->last_opened_at = now();
        $document->last_opened_by = $this->user_id;
        $document->save();

        $navigation = 'documents';

        if ($document->type == 'spreadsheet') {
            $navigation = 'spreadsheets';
        }
        elseif ($document->type == 'presentation') {
            $navigation = 'presentations';
        }

        return view('office.document', [
            'navigation' => $navigation,
            'page_title' => __('Document'),
            'page_subtitle' => __('Manage your documents'),
            'document' => $document,
        ]);
    }

    public function uploadDocumentImage(Request $request)
    {
        $this->authCheck();

        $request->validate([
            'upload' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx,xls,xlsx,ppt,pptx,zip',
        ]);

        $file = $request->file('upload');
        $path = $file->storePublicly('media', 'uploads');

        $media_file = new MediaFile();
        $media_file->workspace_id = $this->workspace_id;
        $media_file->uuid = Str::uuid();
        $media_file->user_id = $this->user_id;
        $media_file->title = $file->getClientOriginalName();
        $media_file->path = $path;
        $media_file->size = $file->getSize();
        $media_file->mime_type = $file->getMimeType();
        $media_file->extension = $file->getClientOriginalExtension();
        $media_file->save();

        return response([
            'url' => config('app.url') . '/uploads/' . $path,
        ]);

    }

    public function saveDocument(Request $request)
    {
        $this->authCheck();
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'uuid' => 'nullable|uuid',
        ]);

        $data = $this->purify($request->all());

        $document = null;

        if (!empty($data['uuid'])) {
            $document = Document::where('uuid', $data['uuid'])
                ->where('workspace_id', $this->workspace_id)
                ->first();
        }

        if (!$document) {
            $request->validate([
                'type' => 'required|string',
            ]);

            $document = new Document();
            $document->uuid = Str::uuid();
            $document->user_id = $this->user_id;
            $document->workspace_id = $this->workspace_id;
            $document->type = $data['type'];
            $document->access_key = Str::random(32);
        }

        $document->title = $data['title'];
        $document->content = app_clean_html_content($request->input('content') ?? '');
        $document->last_opened_at = now();
        $document->save();

        return response([
            'url' => $this->base_url . '/office/document?uuid=' . $document->uuid,
        ]);

    }

    public function loadDocument(Request $request)
    {
        $this->authCheck();
        $request->validate([
            'uuid' => 'required|uuid',
            'access_key' => 'required|string|max:36',
        ]);

        $document = Document::where('uuid', $request->uuid)
            ->where('workspace_id', $this->workspace_id)
            ->first();

        abort_unless($document, 404);

        if ($document->access_key != $request->access_key) {
            abort(404);
        }

        return response($document->content);

    }

    public function downloadDocument(Request $request)
    {
        $this->authCheck();
        $request->validate([
            'uuid' => 'required|uuid',
            'access_key' => 'required|string|max:36',
            'type' => 'required|string',
        ]);

        $document = Document::where('uuid', $request->uuid)
            ->where('workspace_id', $this->workspace_id)
            ->first();

        abort_unless($document, 404);

        if ($document->access_key != $request->access_key) {
            abort(404);
        }

        $type = $request->query('type');

        $file_name = Str::slug($document->title);

        if (empty($file_name)) {
            $file_name = $document->uuid;
        }

        switch ($type) {
            case 'pdf':

                // Generate PDF using dompdf
                $dompdf = new Dompdf();

                $html = view('office.document-pdf', [
                    'document' => $document,
                ])->render();

                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Download the generated PDF
                $dompdf->stream($file_name . '.pdf', [
                    'Attachment' => true
                ]);

                break;

            case 'docx':

                $phpWord = new PhpWord();

                $section = $phpWord->addSection();

                $content = clean($document->content, [
                    'HTML.Allowed' => 'p,br,b,strong,i,em,u,ul,ol,li,table,tr,td,th,thead,tbody,span,div,sub,sup,blockquote,hr,a[href|target|title],h1,h2,h3,h4,h5,h6',
                ]);

                Html::addHtml($section, $content);

                $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
                $objWriter->save($file_name . '.docx');

                // Download the generated DOCX
                return response()->download($file_name . '.docx')->deleteFileAfterSend(true);

                break;
            default:
                abort(404);
        }


    }

    public function calendarEvents(Request $request)
    {
        $this->authCheck();
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        $start = $request->start;
        $start = date('Y-m-d', strtotime($start));
        $end = $request->end;
        $end = date('Y-m-d', strtotime($end));

        $data = [];

        $events = CalendarEvent::where('workspace_id', $this->workspace_id)
            ->where('start', '>=', $start)
            ->where('start', '<=', $end)
            ->get();

        foreach ($events as $event) {
            $data[] = [
                'id' => $event->uuid,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'allDay' => $event->all_day,
            ];
        }


        return response($data);
    }

    public function saveUpload(Request $request)
    {
        $this->authCheck();

        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx,xls,xlsx,ppt,pptx,zip',
        ]);

        $file = $request->file('file');
        $path = $file->storePublicly('media', 'uploads');

        $media_file = new MediaFile();
        $media_file->workspace_id = $this->workspace_id;
        $media_file->uuid = Str::uuid();
        $media_file->user_id = $this->user_id;
        $media_file->title = $file->getClientOriginalName();
        $media_file->path = $path;
        $media_file->size = $file->getSize();
        $media_file->mime_type = $file->getMimeType();
        $media_file->extension = $file->getClientOriginalExtension();
        $media_file->save();

    }

    public function spreadsheets()
    {
        $this->authCheck();
        $documents = Document::getForWorkspace($this->workspace_id, 'spreadsheet');
        $recent_documents = Document::getRecentDocuments($this->workspace_id, 'spreadsheet');
        return view('office.spreadsheets', [
            'navigation' => 'spreadsheets',
            'page_title' => __('Spreadsheets'),
            'page_subtitle' => __('Manage your spreadsheets'),
            'documents' => $documents,
            'recent_documents' => $recent_documents,
        ]);
    }

    public function presentations()
    {
        $this->authCheck();
        $documents = Document::getForWorkspace($this->workspace_id, 'presentation');
        $recent_documents = Document::getRecentDocuments($this->workspace_id, 'presentation');
        return view('office.presentations', [
            'navigation' => 'presentations',
            'page_title' => __('Presentations'),
            'page_subtitle' => __('Manage your presentations'),
            'documents' => $documents,
            'recent_documents' => $recent_documents,
        ]);
    }

    public function calendar()
    {
        $this->authCheck();
        return view('office.calendar', [
            'navigation' => 'calendar',
            'page_title' => __('Calendar'),
            'page_subtitle' => __('Schedules and events'),
        ]);
    }

    public function addressBook()
    {
        $this->authCheck();
        $contacts = Contact::getForWorkspace($this->workspace_id);
        return view('office.address-book', [
            'navigation' => 'address-book',
            'page_title' => __('Address Book'),
            'page_subtitle' => __('Manage your contacts'),
            'contacts' => $contacts,
        ]);
    }

    public function digitalAssets()
    {
        $this->authCheck();
        $files = MediaFile::getForWorkspace($this->workspace_id);
        return view('office.digital-assets', [
            'navigation' => 'digital-assets',
            'page_title' => __('Digital Assets'),
            'page_subtitle' => __('Manage your digital assets'),
            'files' => $files,
        ]);
    }

    public function images()
    {
        $this->authCheck();
        $files = MediaFile::getForWorkspace($this->workspace_id, 'image');
        return view('office.images', [
            'navigation' => 'images',
            'page_title' => __('Images'),
            'page_subtitle' => __('Manage and edit your images'),
            'files' => $files,
        ]);
    }

    public function imageEditor($uuid)
    {
        $this->authCheck();
        $file = MediaFile::getByUuid($this->workspace_id, $uuid);
        abort_unless($file, 404);
        return view('office.image-editor', [
            'navigation' => 'images',
            'page_title' => __('Image Editor'),
            'page_subtitle' => __('Edit your image'),
            'file' => $file,
        ]);
    }

    public function quickShare(Request $request)
    {
        $this->authCheck();

        $tab = $request->query('tab', 'new');

        $page_title = __('Quick Share');
        $page_subtitle = __('Share your files, docs and more');
        $sub_navigation = 'quick_share_new';
        $shares = [];
        $access_logs = [];

        switch ($tab) {
            case 'shares':
                $page_subtitle = __('Manage your shares');
                $shares = QuickShare::getForWorkspace($this->workspace_id);
                $sub_navigation = 'quick_share_shares';
                break;

            case 'access_logs':
                $page_subtitle = __('Access logs');
                $access_logs = QuickShareAccessLog::getForWorkspace($this->workspace_id);
                $sub_navigation = 'quick_share_access_logs';
                break;
        }

        return view('office.quick-share', [
            'navigation' => 'quick_share',
            'sub_navigation' => $sub_navigation,
            'page_title' => $page_title,
            'page_subtitle' => $page_subtitle,
            'shares' => $shares,
            'access_logs' => $access_logs,
            'tab' => $tab,
        ]);
    }

    public function saveQuickShare(Request $request)
    {
        $this->authCheck();

        $request->validate([
            'uuid' => 'nullable|uuid',
            'title' => 'required|string',
        ]);

        $uuid = $request->input('uuid');
        $type = $request->input('type');

        $quick_share = null;

        if ($uuid) {
            $quick_share = QuickShare::getByUuid($this->workspace_id, $uuid);
            abort_unless($quick_share, 404);
            $type = $quick_share->type;
        }

        if (!$quick_share) {
            $request->validate([
                'type' => 'required|string',
            ]);
            $quick_share = new QuickShare();
            $quick_share->workspace_id = $this->workspace_id;
            $quick_share->uuid = Str::uuid();
            $quick_share->user_id = $this->user_id;
            $quick_share->type = $type;
            $quick_share->short_url_key = Str::random(5);
        }

        if ($type === 'url') {
            $request->validate([
                'url' => 'required|url',
            ]);
            $quick_share->url = $request->input('url');
        } elseif ($type === 'text_snippet') {
            $request->validate([
                'content' => 'required|string',
            ]);

            $quick_share->content = $request->input('content');
        }

        $quick_share->title = $request->input('title');
        $quick_share->save();

        return response([
            'url' => $this->base_url . '/office/view-share/' . $quick_share->uuid,
        ]);

    }

    public function settings(Request $request)
    {
        $this->authCheck();
        $tab = $request->query('tab', 'general');
        $page_subtitle = '';
        $sub_navigation = '';
        $api_keys = [];
        switch ($tab) {
            case 'general':
                $page_subtitle = __('General settings');
                $sub_navigation = 'settings_general';
                break;
            case 'api':
                $page_subtitle = __('API settings');
                $sub_navigation = 'settings_api';
                $api_keys = ApiKey::getForWorkspace($this->workspace_id);
                break;
            case 'about':
                $page_subtitle = __('About');
                $sub_navigation = 'settings_about';
                break;
            case 'users':
                $page_subtitle = __('Users');
                $sub_navigation = 'settings_users';
                break;
        }
        return view('office.settings', [
            'navigation' => 'settings',
            'page_title' => __('Settings'),
            'page_subtitle' => $page_subtitle,
            'tab' => $tab,
            'sub_navigation' => $sub_navigation,
            'api_keys' => $api_keys,
        ]);
    }

    public function appModal(Request $request, $type)
    {
        $this->authCheck();
        switch ($type) {
            case 'share-document':

                $request->validate([
                    'uuid' => 'required|uuid',
                ]);

                $document = Document::getByUuid($this->workspace_id, $request->uuid);

                abort_unless($document, 404);

                return view('office.modals.share-document', [
                    'document' => $document,
                ]);

                break;

            case 'share-file':

                $request->validate([
                    'uuid' => 'required|uuid',
                ]);

                $media_file = MediaFile::getByUuid($this->workspace_id, $request->uuid);

                abort_unless($media_file, 404);

                if(empty($media_file->access_key))
                {
                    $media_file->access_key = Str::random(36);
                    $media_file->save();
                }

                return view('office.modals.share-file', [
                    'media_file' => $media_file,
                ]);

                break;
        }
    }

    public function deleteItem($type, $uuid)
    {
        $this->authCheck();
        switch ($type) {
            case 'document':

                $document = Document::getByUuid($this->workspace_id, $uuid);
                if ($document) {
                    $document->delete();
                }

                return redirect()->route('office.documents');

                break;

            case 'media-file':

                $media_file = MediaFile::getByUuid($this->workspace_id, $uuid);

                if ($media_file) {
                    if ($media_file->path) {
                        Storage::disk('uploads')->delete($media_file->path);
                    }
                    $media_file->delete();
                }

                break;

            case 'calendar-event':

                $event = CalendarEvent::getByUuid($this->workspace_id, $uuid);

                if ($event) {
                    $event->delete();
                }

                break;

            case 'user':

                $user = User::getByUuid($this->workspace_id, $uuid);

                if ($user) {
                    if ($user->id == $this->user_id) {
                        abort(403, __('You cannot delete yourself'));
                    }

                    if($user->id == 1)
                    {
                        abort(403, __('You cannot delete the first user'));
                    }
                    $user->delete();
                }

                break;

            case 'api-key':

                $api_key = ApiKey::getByUuid($this->workspace_id, $uuid);

                if ($api_key) {
                    $api_key->delete();
                }

                break;

            case 'contact':

                $contact = Contact::getByUuid($this->workspace_id, $uuid);

                if ($contact) {
                    $contact->delete();
                }

                break;

            case 'quick-share':

                $quick_share = QuickShare::getByUuid($this->workspace_id, $uuid);

                if ($quick_share) {
                    if ($quick_share->path) {
                        Storage::disk('uploads')->delete($quick_share->path);
                    }
                    QuickShareAccessLog::where('workspace_id', $this->workspace_id)
                        ->where('quick_share_id', $quick_share->id)
                        ->delete();

                    $quick_share->delete();
                }

                break;

            case 'quick-share-access-log':

                $quick_share_access_log = QuickShareAccessLog::getByUuid($this->workspace_id, $uuid);

                if ($quick_share_access_log) {
                    $quick_share_access_log->delete();
                }

                break;


        }

        session()->flash('success', __('Deleted successfully.'));

        return redirect()->back();

    }

    public function saveEvent(Request $request)
    {
        $this->authCheck();
        $request->validate([
            'id' => 'nullable|uuid',
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date',
            'all_day' => 'nullable|boolean',
        ]);


        $event = null;

        $start = $request->input('start');
        $start = date('Y-m-d H:i:s', strtotime($start));
        $end = $request->input('end');
        $end = date('Y-m-d H:i:s', strtotime($end));
        $all_day = 0;
        if ($request->input('all_day')) {
            $all_day = 1;
        }

        if ($request->input('id')) {
            $event = CalendarEvent::getByUuid($this->workspace_id, $request->input('id'));
        }

        if (!$event) {
            $event = new CalendarEvent();
            $event->workspace_id = $this->workspace_id;
            $event->uuid = Str::uuid();
            $event->user_id = $this->user_id;
        }

        $event->title = $request->input('title');
        $event->start = $start;
        $event->end = $end;
        $event->all_day = $all_day;
        $event->save();

    }

    public function contact(Request $request)
    {
        $this->authCheck();
        $request->validate([
            'uuid' => 'nullable|uuid',
        ]);

        $contact = null;
        $page_title = __('Address Book');
        $page_subtitle = __('Add a new contact');

        if ($request->query('uuid')) {
            $contact = Contact::getByUuid($this->workspace_id, $request->query('uuid'));
            if ($contact) {
                $page_subtitle = $contact->first_name . ' ' . $contact->last_name;
            }
        }

        return view('office.contact', [
            'navigation' => 'address-book',
            'page_title' => $page_title,
            'page_subtitle' => $page_subtitle,
            'contact' => $contact,
        ]);
    }

    private function createContact($request)
    {
        $contact = null;
        if ($request->input('uuid')) {
            $contact = Contact::getByUuid($this->workspace_id, $request->input('uuid'));
        }

        if (!$contact) {
            $contact = new Contact();
            $contact->workspace_id = $this->workspace_id;
            $contact->uuid = Str::uuid();
            $contact->user_id = $this->user_id;
        }

        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->city = $request->input('city');
        $contact->state = $request->input('state');
        $contact->zip = $request->input('zip');
        $contact->country = $request->input('country');
        $contact->notes = $request->input('notes');
        $contact->save();
        return $contact;
    }

    public function saveContact(Request $request)
    {
        $this->authCheck();
        $request->validate(Contact::defaultValidationRules());
        $contact = $this->createContact($request);
        return response([
            'success' => true,
            'url' => $this->base_url . '/office/contact?uuid=' . $contact->uuid,
        ]);
    }

    public function createQuickShare(Request $request)
    {
        $this->authCheck();

        if ($this->isDemo()) {
            session()->flash('error', __('This action is disabled in demo mode'));
            return response([
                'url' => $this->base_url . '/office/quick-share?tab=new',
            ]);
        }

        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx,xls,xlsx,ppt,pptx,zip',
        ]);

        $file = $request->file('file');
        $path = $file->storePublicly('shares', 'uploads');

        $type = null;

        $mime_type = $file->getMimeType();

        //Check if it is an image
        if (in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/gif'])) {
            $type = 'image';
        } elseif ($mime_type == 'application/pdf') {
            $type = 'pdf';
        } elseif (in_array($mime_type, [
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ])) {
            $type = 'word';
        } elseif (in_array($mime_type, [
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ])) {
            $type = 'excel';
        } elseif (in_array($mime_type, [
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation'
        ])) {
            $type = 'powerpoint';
        } elseif ($mime_type == 'application/zip') {
            $type = 'zip';
        } //Check if it is mp4 video
        elseif ($mime_type == 'video/mp4') {
            $type = 'video';
        }

        $quick_share = new QuickShare();
        $quick_share->workspace_id = $this->workspace_id;
        $quick_share->uuid = Str::uuid();
        $quick_share->user_id = $this->user_id;
        $quick_share->type = $type;
        $quick_share->path = $path;
        $quick_share->title = $file->getClientOriginalName();
        $quick_share->extension = $file->getClientOriginalExtension();
        $quick_share->mime_type = $file->getMimeType();
        $quick_share->size = $file->getSize();
        $quick_share->short_url_key = Str::random(5);
        $quick_share->save();

        return response([
            'url' => $this->base_url . '/office/view-share/' . $quick_share->uuid,
        ]);


    }

    public function viewShare($uuid)
    {
        $this->authCheck();
        $share = QuickShare::getByUuid($this->workspace_id, $uuid);
        if (!$share) {
            abort(404);
        }

        $access_logs = QuickShareAccessLog::where('quick_share_id', $share->id)->orderBy('id', 'desc')->get();

        return \view('office.view.share', [
            'share' => $share,
            'navigation' => 'quick_share',
            'page_title' => __('Quick Share'),
            'page_subtitle' => $share->title,
            'access_logs' => $access_logs,
        ]);
    }

    public function automaticLogin($type)
    {
        if (config('app.env') == 'production') {
            abort(404);
        }

        switch ($type) {
            case 'admin':

                $user = User::first();
                session()->put('user_id', $user->id);

                return redirect()->route('office.dashboard');

                break;
        }
    }

    public function saveSettings(Request $request)
    {
        $this->authCheck();
        $request->validate([
            'type' => 'required|string',
        ]);

        $type = $request->input('type');

        switch ($type) {
            case 'general':

                $request->validate([
                    'workspace_name' => 'required|string|max:100',
                ]);

                update_settings($this->workspace_id, [
                    'workspace_name' => $request->input('workspace_name'),
                ]);

                break;

            case 'api-key':

                $request->validate([
                    'uuid' => 'required|uuid',
                    'name' => 'required|string|max:100',
                ]);

                $api_key = ApiKey::getByUuid($this->workspace_id, $request->input('uuid'));
                if ($api_key) {
                    $api_key->name = $request->input('name');
                    $api_key->save();
                }

                break;


            case 'logo':

                $request->validate([
                    'logo' => 'required|file|mimes:jpeg,png,jpg,gif',
                ]);

                $file = $request->file('logo');

                $path = $file->storePublicly('logo', 'uploads');

                update_settings($this->workspace_id, [
                    'logo' => $path,
                ]);

                return redirect()->back();

                break;

            case 'integrations_openai':

                $this->isSuperAdmin();


                $request->validate([
                    'openai_api_key' => 'nullable|string',
                ]);

                update_settings($this->workspace_id, [
                    'openai_api_key' => $request->input('openai_api_key'),
                ],true);

                break;
        }

        return response([
            'success' => true,
        ]);
    }

    public function user($selected_user)
    {
        $this->authCheck();

        $current_user = null;

        $page_title = __('Users');
        $page_subtitle = __('Add a new user');

        switch ($selected_user) {
            case 'me':
                $current_user = $this->user;
                break;

            case 'new':
                break; # do nothing

            default:
                $current_user = User::getByUuid($this->workspace_id, $selected_user);
                break;

        }

        if ($current_user) {
            $page_subtitle = $current_user->first_name . ' ' . $current_user->last_name;
        }

        return \view('office.user', [
            'navigation' => 'settings',
            'page_title' => $page_title,
            'page_subtitle' => $page_subtitle,
            'current_user' => $current_user,
            'sub_navigation' => 'settings_users',
        ]);

    }

    public function saveUser(Request $request)
    {
        $this->authCheck();
        $request->validate([
            'current_user' => 'nullable|string|max:36',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:255',
            'password' => 'nullable|string|confirmed|min:6',
        ]);

        $user = null;

        $current_user = $request->input('current_user');

        if ($current_user) {
            //Check if user is editing himself
            if ($current_user == 'me') {
                $user = $this->user;
            } else {
                $user = User::getByUuid($this->workspace_id, $current_user);
            }
        }

        if (!$user) {
            //Check if email is already taken
            $user = User::where('email', $request->input('email'))->first();

            if ($user) {
                return response([
                    'success' => false,
                    'errors' => [
                        'email' => __('This email is already taken'),
                    ],
                ], 422);
            }

            $user = new User();
            $user->workspace_id = $this->workspace_id;
            $user->uuid = Str::uuid();
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = $request->input('password') ? Hash::make($request->input('password')) : $user->password;
        $user->save();

        add_activity($this->workspace_id, __('User updated: ' . $user->first_name . ' ' . $user->last_name), $this->user_id);

        return response([
            'success' => true,
        ]);

    }

    public function manageApi($uuid, Request $request)
    {
        $this->authCheck();

        $api = null;

        if ($uuid == 'new') {
            $api = new ApiKey();
            $api->workspace_id = $this->workspace_id;
            $api->user_id = $this->user_id;
            $api->uuid = Str::uuid();
            $api->name = __('New API Key');
            $api->key = Str::random(32);
            $api->save();
        }

        if (!$api) {
            $api = ApiKey::getByUuid($this->workspace_id, $uuid);
            abort_unless($api, 404);
        }

        $action = $request->query('action', 'view');

        if ($action == 'regenerate') {
            $api->key = Str::random(32);
            $api->save();
            return redirect($this->base_url . '/office/manage-api/' . $api->uuid);
        }


        if ($action == 'view') {
            return \view('office.manage-api', [
                'navigation' => 'settings',
                'page_title' => __('API Keys'),
                'page_subtitle' => __('Edit API Key'),
                'api' => $api,
                'sub_navigation' => 'settings_api',
            ]);
        }

    }

    public function apiSaveContact(Request $request)
    {
        $this->apiCheck($request->input('api_key'));

        $validate = Validator::make($request->all(), Contact::defaultValidationRules());

        if ($validate->fails()) {
            return response([
                'success' => false,
                'errors' => $validate->errors(),
            ], 422);
        }

        $contact = $this->createContact($request);

        return response([
            'success' => true,
            'contact' => [
                'uuid' => $contact->uuid,
            ],
        ]);

    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect($this->base_url . '/office/login');
    }

    public function forgotPassword()
    {
        return view('office.auth', [
            'type' => 'forgot_password',
            'page_title' => __('Forgot Password'),
        ]);
    }

    public function passwordReset(Request $request)
    {
        $request->validate([
            'id' => 'required|uuid',
            'token' => 'required|string',
        ]);

        $uuid = $request->input('id');
        $token = $request->input('token');

        $user = User::where('uuid', $uuid)->where('password_reset_token', $token)->first();

        if (!$user) {
            return redirect($this->base_url . '/office/login');
        }

        return view('office.auth', [
            'type' => 'password_reset',
            'page_title' => __('Set New Password'),
            'user' => $user,
            'token' => $token,
            'uuid' => $uuid,
        ]);
    }

    public function passwordResetPost(Request $request)
    {
        $request->validate([
            'uuid' => 'required|uuid',
            'token' => 'required|string',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $uuid = $request->input('uuid');
        $token = $request->input('token');

        $user = User::where('uuid', $uuid)->where('password_reset_token', $token)->first();
        abort_unless($user, 404);

        $user->password = Hash::make($request->input('password'));
        $user->password_reset_token = null;
        $user->save();

        session()->flash('status', __('Password has been reset successfully'));

        return response([
            'success' => true,
        ]);

    }

    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response([
                'success' => false,
                'errors' => [
                    'email' => __('This email is not registered'),
                ],
            ], 422);
        }

        $user->password_reset_token = Str::random(32);
        $user->save();

        session()->flash('status', __('Password reset link has been sent to your email address'));

        try {
            Mail::to($user->email)->send(new UserPasswordReset($user));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
        return response([
            'success' => true,
        ]);
    }

    public function share(Request $request, $hare)
    {
        $share = QuickShare::where('short_url_key', $hare)->first();
        abort_unless($share, 404);

        //Get user agent
        $user_agent = $request->header('User-Agent');

        $os = null;
        $device = null;
        $brand = null;
        $model = null;
        $browser = null;
        $is_bot = false;

        try {
            $device_detector = new DeviceDetector($user_agent);

            $device_detector->parse();

            if ($device_detector->isBot()) {
                $is_bot = true;
            }

            $os = $device_detector->getOs();
            $device = $device_detector->getDeviceName();
            $brand = $device_detector->getBrandName();
            $model = $device_detector->getModel();
            $browser = $device_detector->getClient();
        } catch (\Exception $e) {
            Log::alert($e->getMessage());
        }

        //Add access log
        $share_log = new QuickShareAccessLog();
        $share_log->workspace_id = $share->workspace_id;
        $share_log->uuid = Str::uuid();
        $share_log->quick_share_id = $share->id;
        $share_log->ip = get_client_ip();
        $share_log->user_agent = $user_agent;
        $share_log->os = $os['name'] ?? null;
        $share_log->device = $device;
        $share_log->brand = $brand;
        $share_log->model = $model;
        $share_log->browser = $browser['name'] ?? null;
        $share_log->is_bot = $is_bot;
        $share_log->save();

        $type = $share->type;

        if ($type == 'url') {
            return redirect($share->url);
        }

        return \view('office.share', [
            'share' => $share,
            'page_title' => $share->title,
        ]);

    }

    public function viewFile($uuid)
    {
        $this->authCheck();
        $media_file = MediaFile::getByUuid($this->workspace_id, $uuid);
        abort_unless($media_file, 404);

        return \view('office.view.file', [
            'media_file' => $media_file,
            'page_title' => $media_file->title,
        ]);

    }

    public function downloadMediaFile($uuid)
    {
        $media_file = MediaFile::getByUuid($this->workspace_id, $uuid);
        abort_unless($media_file, 404);

        $file_path = base_path('uploads/' . $media_file->path);

        if (!file_exists($file_path)) {
            abort(404);
        }

        $title = $media_file->title;
        $extension = $media_file->extension;

        //Remove extension from title
        $title = str_replace('.' . $extension, '', $title);

        $file_name = $title . '.' . $extension;

        return response()->download($file_path, $file_name);
    }

    public function downloadSharedFile($uuid)
    {
        $quick_share = QuickShare::where('uuid', $uuid)->first();

        abort_unless($quick_share, 404);
        abort_unless($quick_share->path, 404);

        $file_path = base_path('uploads/' . $quick_share->path);

        if (!file_exists($file_path)) {
            abort(404);
        }

        $title = $quick_share->title;
        $extension = $quick_share->extension;

        //Remove extension from title
        $title = str_replace('.' . $extension, '', $title);

        $file_name = $title . '.' . $extension;

        return response()->download($file_path, $file_name);

    }

    public function signup()
    {
        if (!$this->isSaaS()) {
            abort(404);
        }
        return view('office.auth', [
            'type' => 'signup',
            'page_title' => __('Sign Up'),
        ]);
    }

    public function signupPost(Request $request)
    {
        if (!$this->isSaaS()) {
            abort(404);
        }

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        //Create workspace
        $workspace = new Workspace();
        $workspace->uuid = Str::uuid();
        $workspace->name = __('messages.workspace_name', ['name' => $request->input('first_name')]);
        $workspace->is_on_free_trial = true;
        $workspace->save();

        $user = new User();
        $user->uuid = Str::uuid();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->workspace_id = $workspace->id;
        $user->save();


        $user->workspace_id = $workspace->id;
        $user->save();

        session()->put('user_id', $user->id);

        //Check if form is submitted via ajax
        if ($request->ajax()) {
            return response([
                'success' => true,
            ]);
        }

        return redirect()->route('office.dashboard');

    }

    public function ckeditorCloudToken(Request $request)
    {
        $this->authCheck();

        $accessKey = '';
        $environmentId = '';

        $payload = [
            'aud' => $environmentId,
            'iat' => time(),
            'sub' => 'user-' . $this->user->id,
            'user' => [
                'email' => $this->user->email,
                'name' => $this->user->first_name . ' ' . $this->user->last_name,
            ],
            'auth' => [
                'collaboration' => [
                    '*' => [
                        'role' => 'writer',
                    ],
                ],
            ],
        ];

        $jwt = JWT::encode($payload, $accessKey, 'HS256');

        return response([
            'token' => $jwt,
        ]);


    }

    public function billing(Request $request)
    {
        abort_unless($this->isSaaS(), 404);

        $this->authCheck();

        $subscription_plans = SubscriptionPlan::all();

        return view('office.billing', [
            'navigation' => 'settings',
            'page_title' => __('Settings'),
            'page_subtitle' => __('Billing'),
            'sub_navigation' => 'settings_billing',
            'subscription_plans' => $subscription_plans,
        ]);

    }

    public function subscribe($uuid, Request $request)
    {
        abort_unless($this->isSaaS(), 404);
        $this->authCheck();

        $subscription_plan = SubscriptionPlan::where('uuid', $uuid)->first();


        abort_unless($subscription_plan, 404);

        $payment_gateways = PaymentGateway::getForWorkspace(1)
            ->keyBy('api_name')
            ->all();

        $term = $request->query('term', 'monthly');

        return view('office.subscribe', [
            'navigation' => 'settings',
            'page_title' => __('Settings'),
            'page_subtitle' => __('Billing'),
            'sub_navigation' => 'settings_billing',
            'subscription_plan' => $subscription_plan,
            'payment_gateways' => $payment_gateways,
            'term' => $term,
        ]);

    }

    public function paymentStripe(Request $request)
    {
        abort_unless($this->isSaaS(), 404);
        $this->authCheck();

        $request->validate([
            'plan_id' => 'required|uuid',
            'term' => 'required|string',
            'token_id' => 'required',
        ]);

        $plan = SubscriptionPlan::getByUuid(1, $request->plan_id);

        if ($plan) {
            $next_renewal_date = date('Y-m-d');
            if ($request->term === 'monthly') {
                $amount = $plan->price_monthly;
                $next_renewal_date = date('Y-m-d', strtotime('+1 month'));
            } elseif ($request->term === 'yearly') {
                $amount = $plan->price_yearly;
                $next_renewal_date = date('Y-m-d', strtotime('+1 year'));
            } else {
                abort(401);
            }

            $gateway = PaymentGateway::where('api_name', 'stripe')->first();

            if (!$gateway) {
                abort(401);
            }

            $token = $request->token_id;

            try {
                // Set your secret key: remember to change this to your live secret key in production
                // See your keys here: https://dashboard.stripe.com/account/apikeys
                Stripe::setApiKey($gateway->private_key);

                // Create a Customer:

                $customer_data = [];

                $customer_data["source"] = $token;
                $customer_data["email"] = $this->user->email;
                $customer_data["name"] =
                    $this->user->first_name . " " . $this->user->last_name;

                $customer = Customer::create($customer_data);

                $card = new CreditCard();
                $card->workspace_id = 1;
                $card->uuid = Str::uuid();
                $card->gateway_id = $gateway->id;
                $card->user_id = $this->user->id;
                $card->token = $customer->id;
                $card->save();

                $amount_x_100 = (int)$amount * 100;
                // Charge the Customer instead of the card:
                $charge = Charge::create([
                    'amount' => $amount_x_100,
                    'currency' => getWorkspaceCurrency($this->super_settings),
                    'customer' => $customer->id,
                    'description' => $plan->name,
                    'statement_descriptor' => substr($this->super_settings['workspace_name'] ?? config('app.name'), 0, 20), // Maximum 22 character
                ]);

                $workspace = Workspace::find($this->user->workspace_id);

                $workspace->is_subscribed = 1;
                $workspace->term = $request->term;
                $workspace->subscription_start_date = date('Y-m-d');
                $workspace->next_renewal_date = $next_renewal_date;
                $workspace->plan_amount = $amount;
                $workspace->is_on_free_trial = 0;
                $workspace->plan_id = $plan->id;
                $workspace->save();

                $transaction = new Transaction();
                $transaction->workspace_id = 1;
                $transaction->uuid = Str::uuid();
                $transaction->gateway_id = $gateway->id;
                $transaction->user_id = $this->user->id;
                $transaction->plan_id = $plan->id;
                $transaction->amount = $amount;
                $transaction->currency = getWorkspaceCurrency($this->super_settings);
                $transaction->payment_method = 'card';
                $transaction->transaction_id = $charge->id ?? '';
                $transaction->date = date('Y-m-d');
                $transaction->description = $workspace->name . ' - ' . $plan->name;
                $transaction->save();

                return redirect('/office/billing')->with('status', __('You have successfully subscribed to the plan!'));

            } catch (\Exception $e) {
                return response(
                    [
                        'success' => false,
                        'errors' => [
                            'system' =>
                                'An error occurred! ' . $e->getMessage(),
                        ],
                    ],
                    422
                );
            }
        }

    }

    public function validatePaypalSubscription(Request $request)
    {

        $paypal_gateway = PaymentGateway::where('api_name', 'paypal')
            ->where('workspace_id', 1)
            ->first();

        if ($paypal_gateway) {

            $client_id = $paypal_gateway->api_key;
            $client_secret = $paypal_gateway->api_secret;

            if (!empty($client_id) && !empty($client_secret)) {

                // get access token

                $url = 'https://api.paypal.com/v1/oauth2/token';

                $response = Http::withBasicAuth($client_id, $client_secret)->post($url, [
                    'grant_type' => 'client_credentials',
                ]);

                $access_token = $response->json()['access_token'];

                $subscription_id = $request->input('subscription_id');
                $url = 'https://api.paypal.com/v1/billing/subscriptions/' . $subscription_id;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $access_token,
                ));
                $result = curl_exec($ch);
                curl_close($ch);
                $result = json_decode($result, true);
                if (!empty($result['status']) && $result['status'] == 'ACTIVE') {
                    $plan_id = $result['plan_id'];
                    $plan = SubscriptionPlan::where('paypal_plan_id', $plan_id)->first();
                    if (!empty($plan)) {
                        $this->workspace->plan_id = $plan->id;
                        $this->workspace->is_subscribed = 1;
                        $this->workspace->save();
                    }

                }
            }

            return redirect($this->base_url. '/dashboard')->with('status', 'You have successfully subscribed to the plan!');

        }
    }

    public function privacyPolicy()
    {
        $post = Post::where('api_name', 'privacy_policy')
            ->where('workspace_id', 1)
            ->first();
        return view('website.message',[
            'post' => $post,
        ]);
    }

    public function termsOfService()
    {
        $post = Post::where('api_name', 'terms_of_service')
            ->where('workspace_id', 1)
            ->first();
        return view('website.message',[
            'post' => $post,
        ]);
    }

    public function askAiToWrite(Request $request)
    {
        $this->authCheck();
        $this->validate($request, [
            'content' => 'required',
        ]);

        $content = $request->input('content');

        $result = '';

        if(!empty($this->super_settings['openai_api_key']) && $content)
        {
            if($this->isDemo() || $this->super_settings['openai_api_key'] == 'demo')
            {
                $result = 'Hey there! Unfortunately, this feature is disabled in the Demo. To know how to enable it in the Live, visit- https://www.cloudonex.com/help/cloudoffice-saas/how-to-integrate-with-chatgpt';
            }
            else{
                //Set OpenAI API Key
                $client = OpenAI::client($this->super_settings['openai_api_key']);

                try {
                    $response = $client->chat()->create([
                        'model' => 'gpt-3.5-turbo',
                        'messages' => [
                            [
                                'role' => 'user',
                                'content' => $content,
                            ],
                        ],
                    ]);

                    if(!empty($response->choices))
                    {
                        foreach ($response->choices as $data) {
                            $result .= $data->message->content;
                        }
                    }
                }
                catch (\Exception $e)
                {
                    if($this->user->is_super_admin)
                    {
                        $result = 'Error: '.$e->getMessage();
                    }
                    else{
                        $result = __('Sorry, I am not able to write anything for you.');
                    }
                }
            }

        }

        if(empty($result))
        {
            $result = __('Sorry, I am not able to write anything for you.');
        }

        //Convert result markdown to html
        $result = Str::markdown($result);

        return response()->json([
            'success' => true,
            'result' => $result,
        ]);

    }
}
