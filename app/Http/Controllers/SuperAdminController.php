<?php

namespace App\Http\Controllers;

use App\Models\MediaFile;
use App\Models\PaymentGateway;
use App\Models\Post;
use App\Models\SubscriptionPlan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Workspace;
use App\Supports\DataHandler;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class SuperAdminController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        return redirect()->route('super-admin.dashboard');
    }

    public function login()
    {
        return view('office.auth',[
            'type' => 'super_admin_login',
            'page_title' => __('Login'),
        ]);
    }

    public function dashboard()
    {
        $this->isSuperAdmin();

        $users = User::listForSuperAdmin();
        $recent_users = $users->sortByDesc('id')->take(5);
        $workspaces = Workspace::listForSuperAdmin();
        $recent_workspaces = $workspaces->sortByDesc('id')->take(5);

        $users_count = $users->count();
        $users = $users->keyBy('id')->all();
        $workspaces_count = $workspaces->count();
        $storage = MediaFile::listForSuperAdmin()
            ->sum('size');

        // Convert to MB
        $storage = $storage / 1024 / 1024;
        $storage = round($storage, 2);

        $user_signups_last_30_days = User::where('created_at','>=',date('Y-m-d H:i:s',strtotime('-30 days')))
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map(function($item, $key) {
                return count($item);
            })
            ->all();

        $transactions_last_30_days = Transaction::where('created_at','>=',date('Y-m-d H:i:s',strtotime('-30 days')))
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map(function($item, $key) {
                // Sum the amount
                $amount = 0;
                foreach ($item as $i)
                {
                    $amount += $i->amount;
                }
                return $amount;
            })
            ->all();

        return view('super-admin.dashboard',[
            'page_title' => __('Dashboard'),
            'navigation' => 'dashboard',
            'users' => $users,
            'recent_users' => $recent_users,
            'workspaces' => $workspaces,
            'recent_workspaces' => $recent_workspaces,
            'users_count' => $users_count,
            'workspaces_count' => $workspaces_count,
            'storage' => $storage,
            'user_signups_last_30_days' => $user_signups_last_30_days,
            'transactions_last_30_days' => $transactions_last_30_days,
        ]);

    }

    public function workspaces()
    {
        $this->isSuperAdmin();
        $workspaces = Workspace::listForSuperAdmin();
        $users = User::listForSuperAdmin()
            ->groupBy('workspace_id')
            ->all();
        return view('super-admin.workspaces',[
            'page_title' => __('Workspaces'),
            'navigation' => 'workspaces',
            'workspaces' => $workspaces,
            'users' => $users,
        ]);
    }

    public function users()
    {
        $this->isSuperAdmin();
        $users = User::listForSuperAdmin();
        return view('super-admin.users',[
            'page_title' => __('Users'),
            'navigation' => 'users',
            'users' => $users,
        ]);
    }

    public function payments()
    {
        $this->isSuperAdmin();
        $transactions = Transaction::listForSuperAdmin();
        $workspaces = Workspace::listForSuperAdmin()
            ->keyBy('id')
            ->all();
        $users = User::listForSuperAdmin()
            ->keyBy('id')
            ->all();
        $plans = SubscriptionPlan::listForSuperAdmin()
            ->keyBy('id')
            ->all();
        return view('super-admin.payments',[
            'page_title' => __('Payments'),
            'page_subtitle' => __('Transactions'),
            'navigation' => 'payments',
            'transactions' => $transactions,
            'workspaces' => $workspaces,
            'users' => $users,
            'plans' => $plans,
        ]);
    }

    public function files()
    {
        $this->isSuperAdmin();

        $files = MediaFile::listForSuperAdmin();
        $workspaces = Workspace::listForSuperAdmin()
            ->keyBy('id')
            ->all();

        return view('super-admin.files',[
            'page_title' => __('Files'),
            'navigation' => 'files',
            'files' => $files,
            'workspaces' => $workspaces,
        ]);
    }

    public function landingPage()
    {
        $this->isSuperAdmin();

        $post = Post::where('is_home_page',1)
            ->first();

        $images = MediaFile::getForWorkspace($this->workspace_id,'image');

        return view('super-admin.landing-page',[
            'page_title' => __('Landing Page'),
            'navigation' => 'landing_page',
            'sub_navigation' => 'manage_landing_page',
            'post' => $post,
            'images' => $images,
        ]);
    }

    public function settings(Request $request)
    {
        $this->isSuperAdmin();

        $tab = $request->query('tab');

        abort_unless($tab,404);

        $data = [];
        $data['tab'] = $tab;
        $data['navigation'] = 'settings';
        $data['page_title'] = __('Settings');

        switch ($tab)
        {
            case 'general':

                $data['page_subtitle'] = __('General Settings');
                $data['sub_navigation'] = 'settings_general';

                break;

            case 'users':

                $data['page_subtitle'] = __('Super Admins');
                $data['sub_navigation'] = 'settings_users';

                    break;

                    case 'payment_gateways':

                        $data['page_subtitle'] = __('Payment Gateways');
                        $data['sub_navigation'] = 'settings_payment_gateways';
                        $data['gateways'] = PaymentGateway::getForWorkspace($this->workspace_id)
                            ->keyBy('api_name')
                            ->all();

                        break;

            case 'user':

                $current_user = null;

                $selected_user = $request->query('current_user');

                $data['page_title'] = __('Users');
                $data['page_subtitle'] = __('Add a new user');

                switch ($selected_user)
                {
                    case 'me': $current_user = $this->user; break;

                    case 'new': break; # do nothing

                    default: $current_user = User::getByUuid($this->workspace_id, $selected_user); break;

                }

                if($current_user)
                {
                    $data['page_subtitle'] = $current_user->first_name.' '.$current_user->last_name;
                }

                $data['current_user'] = $current_user;

                $data['sub_navigation'] = 'settings_users';


                break;

            case 'about':

                    $data['page_subtitle'] = __('About');
                    $data['sub_navigation'] = 'settings_about';

                    break;

            case 'integrations':

                $data['page_subtitle'] = __('Integrations');
                $data['sub_navigation'] = 'settings_integrations';

                break;

                case 'mailserver':

                    $data['page_subtitle'] = __('Mail Server');
                    $data['sub_navigation'] = 'settings_mailserver';
    
                    break;
        }

        return view('super-admin.settings',$data);
    }

    public function savePost(Request $request)
    {
        $this->isSuperAdmin();

        $request->validate([
            'post_id' => 'nullable|integer',
        ]);

        $post = Post::where('is_home_page',1)
            ->first();

        if(!$post)
        {
            $post = new Post();
            $post->is_home_page = 1;
            $post->workspace_id = $this->workspace_id;
            $post->uuid = Str::uuid();
            $post->type = 'page';
        }

        $title = $request->input('title');
        $slug = (Str::slug($title) !== '') ? Str::slug($title) : Str::uuid();

        $post->title = $title;

        $post->settings = $request->input('settings');
        $post->content = $request->input('content');
        $post->slug = $slug;
        $post->save();
    }

    public function saveUser(Request $request)
    {
        $this->isSuperAdmin();
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

        if($current_user)
        {
            //Check if user is editing himself
            if($current_user == 'me')
            {
                $user = $this->user;
            }
            else
            {
                $user = User::getByUuid($this->workspace_id, $current_user);
            }
        }

        if(!$user)
        {
            //Check if email is already taken
            $user = User::where('email', $request->input('email'))->first();

            if($user)
            {
                return response([
                    'success' => false,
                    'errors' => [
                        'email' => __('This email is already taken'),
                    ],
                ],422);
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
        $user->is_super_admin = 1;
        $user->save();

        add_activity($this->workspace_id, __('User updated: '. $user->first_name.' '.$user->last_name), $this->user_id);

        return response([
            'success' => true,
        ]);
    }

    public function subscriptionPlans()
    {
        $this->isSuperAdmin();

        $subscription_plans = SubscriptionPlan::listForSuperAdmin();

        return view('super-admin.subscription-plans',[
            'page_title' => __('Plans'),
            'navigation' => 'plans',
            'subscription_plans' => $subscription_plans,
        ]);
    }

    public function subscriptionPlan(Request $request)
    {
        $this->isSuperAdmin();

        $request->validate([
            'uuid' => 'nullable|uuid',
        ]);

        $subscription_plan = null;

        if($request->query('uuid'))
        {
            $subscription_plan = SubscriptionPlan::where('uuid',$request->query('uuid'))
                ->first();
        }

        $available_modules = onLight('modules');


        return view('super-admin.subscription-plan',[
            'page_title' => __('Plan'),
            'navigation' => 'plans',
            'subscription_plan' => $subscription_plan,
            'available_modules' => $available_modules,
        ]);
    }

    public function saveSubscriptionPlan(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'is_free' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'features' => 'nullable|array',
            'modules' => 'nullable|array',
            'uuid' => 'nullable|uuid',
        ]);

        $subscription_plan = null;

        if($request->input('uuid'))
        {
            $subscription_plan = SubscriptionPlan::where('uuid',$request->input('uuid'))
                ->first();
        }

        $name = $request->input('name');

        if(!$subscription_plan)
        {
            $subscription_plan = new SubscriptionPlan();
            $subscription_plan->uuid = Str::uuid();
            $slug = (Str::slug($name) !== '') ? Str::slug($name) : Str::uuid();
            $subscription_plan->slug = $slug;
        }

        $subscription_plan->name = $name;
        $subscription_plan->price_monthly = createFromCurrency($request->input('price_monthly'),getWorkspaceCurrency($this->super_settings));
        $subscription_plan->price_yearly = createFromCurrency($request->input('price_yearly'),getWorkspaceCurrency($this->super_settings));
        $subscription_plan->is_free = $request->input('is_free',0);
        $subscription_plan->is_featured = $request->input('is_featured',0);
        $subscription_plan->features = $request->input('features');
        $subscription_plan->modules = $request->input('modules');
        $subscription_plan->paypal_plan_id = $request->input('paypal_plan_id');
        $subscription_plan->stripe_plan_id = $request->input('stripe_plan_id');
        $subscription_plan->save();

        return response([
            'url' => $this->base_url.'/super-admin/subscription-plan?uuid='.$subscription_plan->uuid,
        ]);

    }

    public function savePaymentGateway(Request $request)
    {
        $this->isSuperAdmin();

        $request->validate([
            'name' => 'required|string',
            'api_name' => 'required|string',
            'api_key' => 'nullable|string',
            'api_secret' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $api_name = $request->input('api_name');

        switch ($api_name)
        {
            case 'paypal':
                case 'stripe':

                $gateway = PaymentGateway::getByApiName($this->workspace_id,$api_name);

                if(!$gateway)
                {
                    $gateway = new PaymentGateway();
                    $gateway->uuid = Str::uuid();
                    $gateway->workspace_id = $this->workspace_id;
                    $gateway->api_name = $api_name;
                }

                $gateway->name = $request->input('name');
                $gateway->api_key = $request->input('api_key');
                $gateway->api_secret = $request->input('api_secret');
                $gateway->is_active = $request->input('is_active',0);
                $gateway->save();

                break;
        }

        session()->flash('status', __('Payment gateway saved successfully!'));

    }

    public function reports(Request $request, $type)
    {
        $this->isSuperAdmin();

        switch ($type)
        {
            case 'signups':
                return view('super-admin.reports.signups',[
                    'page_title' => __('Reports'),
                    'page_subtitle' => __('Signups'),
                    'navigation' => 'reports',
                    'sub_navigation' => 'reports_signups',
                ]);
            case 'usage':
                return view('super-admin.reports.usage',[
                    'page_title' => __('Reports'),
                    'page_subtitle' => __('Usage'),
                    'navigation' => 'reports',
                    'sub_navigation' => 'reports_usage',
                ]);
                case 'access-logs':
                return view('super-admin.reports.access-logs',[
                    'page_title' => __('Reports'),
                    'page_subtitle' => __('Access Logs'),
                    'navigation' => 'reports',
                    'sub_navigation' => 'reports_access_logs',
                ]);
        }


    }

    public function deleteItem($type, $uuid)
    {
        $this->isSuperAdmin();

        switch ($type)
        {
            case 'subscription-plan':
                $subscription_plan = SubscriptionPlan::where('uuid',$uuid)
                    ->first();

                if($subscription_plan)
                {
                    $subscription_plan->delete();
                }
                break;

                case 'user':
                $user = User::where('uuid',$uuid)
                    ->first();

                if($user && $user->id != $this->user_id)
                {
                    $user->delete();
                }
                break;

            case 'transaction':

                $transaction = Transaction::where('uuid',$uuid)
                    ->first();

                if($transaction)
                {
                    $transaction->delete();
                }

                break;


        }

        return redirect()->back();
    }

    public function viewUser($uuid)
    {
        $this->isSuperAdmin();

        $user = User::where('uuid',$uuid)
            ->first();

        if(!$user)
        {
            abort(404);
        }

        return view('super-admin.view-user',[
            'page_title' => __('User'),
            'navigation' => 'users',
            'user' => $user,
        ]);
    }

    public function viewWorkspace($uuid, Request $request)
    {

        $this->isSuperAdmin();

        $workspace = Workspace::where('uuid',$uuid)
            ->first();

        if(!$workspace)
        {
            abort(404);
        }

        $action = $request->query('action');

        if($action == 'suspend')
        {
            $workspace->is_active = 0;
            $workspace->save();
            return redirect()->route('super-admin.workspaces');
        }

        if($action == 'unsuspend')
        {
            $workspace->is_active = 1;
            $workspace->save();
            return redirect()->route('super-admin.workspaces');
        }

        $users = User::where('workspace_id',$workspace->id)
            ->get();

        $subscription_plan = null;

        if($workspace->subscription_plan_id)
        {
            $subscription_plan = SubscriptionPlan::where('id',$workspace->subscription_plan_id)
                ->first();
        }

        $payment_gateways = PaymentGateway::where('workspace_id',$workspace->id)
            ->get();

        $transactions = Transaction::where('workspace_id',$workspace->id)
            ->get();

        $subscription_plans = SubscriptionPlan::where('workspace_id',$workspace->id)
            ->get();

        return view('super-admin.view-workspace',[
            'page_title' => __('Workspace'),
            'navigation' => 'workspaces',
            'workspace' => $workspace,
            'users' => $users,
            'subscription_plan' => $subscription_plan,
            'payment_gateways' => $payment_gateways,
            'transactions' => $transactions,
            'subscription_plans' => $subscription_plans,
        ]);

    }

    public function goTo($where)
    {
        $this->isSuperAdmin();
        switch ($where)
        {
            case 'privacy-policy-editor':

                $post = Post::where('workspace_id',$this->workspace_id)
                    ->where('api_name','privacy_policy')
                    ->first();

                return redirect($this->base_url.'/super-admin/post-editor/'.$post->uuid);

            case 'terms-of-service-editor':

                    $post = Post::where('workspace_id',$this->workspace_id)
                        ->where('api_name','terms_of_service')
                        ->first();

                    return redirect($this->base_url.'/super-admin/post-editor/'.$post->uuid);
        }
    }

    public function postEditor($uuid, Request $request)
    {
        $this->isSuperAdmin();

        $post = Post::where('uuid',$uuid)
            ->where('workspace_id',$this->workspace_id)
            ->first();

        abort_unless($post, 404);

        return view('super-admin.post-editor',[
            'page_title' => __('Post Editor'),
            'page_subtitle' => $post->title,
            'navigation' => 'landing_page',
            'sub_navigation' => 'landing_page_'.$post->api_name,
            'post' => $post,
        ]);

    }

    public function savePostContent(Request $request)
    {
        $this->isSuperAdmin();

        $request->validate([
            'uuid' => 'required',
            'content' => 'required',
            'title' => 'required|string|max:255',
        ]);

        $post = Post::where('uuid',$request->input('uuid'))
            ->where('workspace_id',$this->workspace_id)
            ->first();

        abort_unless($post, 404);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        session()->flash('status', __('Post saved successfully!'));

        return response([
            'status' => 'success',
            'message' => __('Post saved successfully!'),
        ]);
    }

}
