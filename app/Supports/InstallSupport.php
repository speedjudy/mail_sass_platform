<?php
namespace App\Supports;

use App\Models\Contact;
use App\Models\Document;
use App\Models\MediaFile;
use App\Models\Setting;
use App\Models\Workspace;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class InstallSupport{

    public static function createDatabaseTables()
    {
        if(!Schema::hasTable('users'))
        {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id')->default(0);
                $table->uuid();
                $table->unsignedInteger('role_id')->default(0);
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('email');
                $table->string('password');
                $table->string('phone')->nullable();
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('country')->nullable();
                $table->string('zip')->nullable();
                $table->string('avatar')->nullable();
                $table->string('timezone')->nullable();
                $table->boolean('is_super_admin')->default(false);
                $table->string('access_key', 36)->nullable();
                $table->string('password_reset_token', 36)->nullable();
                $table->dateTime('last_login_at')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('settings'))
        {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id')->default(0);
                $table->string('key');
                $table->text('value')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('activities'))
        {
            Schema::create('activities', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id')->default(0);
                $table->unsignedInteger('user_id')->default(0);
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }



        if(!Schema::hasTable('documents'))
        {
            Schema::create('documents', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id')->default(0);
                $table->uuid();
                $table->unsignedInteger('user_id')->default(0);
                $table->string('type')->nullable();
                $table->string('title')->nullable();
                $table->longText('content')->nullable();
                $table->boolean('is_published')->default(false);
                $table->string('slug')->nullable();
                $table->string('access_key', 36)->nullable();
                $table->text('attachment')->nullable();
                $table->unsignedInteger('last_opened_by')->default(0);
                $table->timestamp('last_opened_at')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('media_files'))
        {
            Schema::create('media_files', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id')->default(0);
                $table->uuid();
                $table->unsignedInteger('user_id')->default(0);
                $table->unsignedInteger('directory_id')->default(0);
                $table->unsignedInteger('size')->default(0);
                $table->unsignedSmallInteger('width')->default(0);
                $table->unsignedSmallInteger('height')->default(0);
                $table->string('folder')->nullable();
                $table->string('title')->nullable();
                $table->string('path');
                $table->string('mime_type',)->nullable();
                $table->string('extension', 10)->nullable();
                $table->text('description')->nullable();
                $table->string('access_key', 36)->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('calendar_events'))
        {
            Schema::create('calendar_events', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id');
                $table->uuid();
                $table->unsignedInteger('user_id')->default(0);
                $table->unsignedInteger('contact_id')->default(0);
                $table->unsignedInteger('admin_id')->default(0);
                $table->unsignedInteger('manager_id')->default(0);
                $table->unsignedInteger('address_id')->default(0);
                $table->string('title');
                $table->dateTime('start')->nullable();
                $table->dateTime('end')->nullable();
                $table->boolean('all_day')->default(false);
                $table->enum('priority', ['high', 'medium', 'low'])->default('medium');
                $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
                $table->enum('type', ['leave', 'work','system', 'personal', 'holiday', 'other'])->default('other');
                $table->string('access_key')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('contacts'))
        {
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id')->default(0);
                $table->uuid();
                $table->unsignedInteger('user_id')->default(0);
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('title')->nullable();
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('country')->nullable();
                $table->string('zip')->nullable();
                $table->string('avatar')->nullable();
                $table->string('access_key', 36)->nullable();
                $table->text('notes')->nullable();
                $table->date('birthday')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('quick_shares'))
        {
            Schema::create('quick_shares', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id')->default(0);
                $table->uuid();
                $table->unsignedInteger('user_id')->default(0);
                $table->unsignedInteger('contact_id')->default(0);
                $table->string('type')->nullable();
                $table->string('sub_type')->nullable();
                $table->string('title')->nullable();
                $table->string('url')->nullable();
                $table->string('path')->nullable();
                $table->string('mime_type',)->nullable();
                $table->string('extension', 10)->nullable();
                $table->unsignedInteger('size')->default(0);
                $table->longText('content')->nullable();
                $table->unsignedInteger('view_count')->default(0);
                $table->unsignedInteger('download_count')->default(0);
                $table->string('access_key')->nullable();
                $table->string('short_url_key')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('quick_share_access_logs'))
        {
            Schema::create('quick_share_access_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id')->default(0);
                $table->unsignedInteger('quick_share_id')->default(0);
                $table->uuid();
                $table->unsignedInteger('user_id')->default(0);
                $table->unsignedInteger('contact_id')->default(0);
                $table->string('ip')->nullable();
                $table->string('user_agent')->nullable();
                $table->string('country')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('browser')->nullable();
                $table->string('os')->nullable();
                $table->string('device')->nullable();
                $table->string('brand')->nullable();
                $table->string('model')->nullable();
                $table->boolean('is_bot')->default(false);
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('api_keys'))
        {
            Schema::create('api_keys', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('workspace_id')->default(0);
                $table->uuid();
                $table->unsignedInteger('user_id')->default(0);
                $table->string('name')->nullable();
                $table->string('key')->nullable();
                $table->string('secret')->nullable();
                $table->timestamps();
            });
        }


        if(it_is_a_saas())
        {
            if(!Schema::hasTable('workspaces'))
            {
                Schema::create('workspaces', function (Blueprint $table) {
                    $table->id();
                    $table->uuid();
                    $table->unsignedInteger('owner_id')->default(0);
                    $table->string('name')->nullable();
                    $table->boolean('is_active')->default(true);
                    $table->boolean('is_subscribed')->default(false);
                    $table->boolean('is_on_free_trial')->default(false);
                    $table->unsignedInteger('free_trial_days')->default(0);
                    $table->date('free_trial_ends_at')->nullable();
                    $table->unsignedInteger('plan_id')->default(0);
                    $table->string('plan_name')->nullable();
                    $table->string('plan_type')->nullable();
                    $table->string('term')->nullable();
                    $table->date('subscription_start_date')->nullable();
                    $table->date('next_renewal_date')->nullable();
                    $table->decimal('plan_amount', 10, 2)->default(0);
                    $table->string('plan_currency')->nullable();
                    $table->string('plan_interval')->nullable();
                    $table->unsignedInteger('plan_interval_count')->default(0);
                    $table->unsignedInteger('plan_storage_space')->default(0);
                    $table->unsignedInteger('plan_users')->default(0);
                    $table->unsignedInteger('plan_contacts')->default(0);
                    $table->boolean('is_on_grace_period')->default(false);
                    $table->unsignedInteger('grace_period_days')->default(0);
                    $table->date('grace_period_ends_at')->nullable();
                    $table->text('modules')->nullable();
                    $table->timestamps();
                });
            }

            if(!Schema::hasTable('plans'))
            {
                Schema::create('plans', function (Blueprint $table) {
                    $table->id();
                    $table->uuid();
                    $table->string('name')->nullable();
                    $table->string('type')->nullable();
                    $table->decimal('amount', 10, 2)->default(0);
                    $table->string('currency')->nullable();
                    $table->string('interval')->nullable();
                    $table->unsignedInteger('interval_count')->default(0);
                    $table->unsignedInteger('storage_space')->default(0);
                    $table->unsignedInteger('users')->default(0);
                    $table->unsignedInteger('contacts')->default(0);
                    $table->text('modules')->nullable();
                    $table->text('features')->nullable();
                    $table->boolean('is_active')->default(true);
                    $table->boolean('is_default')->default(false);
                    $table->boolean('is_free')->default(false);
                    $table->boolean('is_featured')->default(false);
                    $table->string('paypal_plan_id')->nullable();
                    $table->string('stripe_plan_id')->nullable();
                    $table->timestamps();
                });

                if(!Schema::hasTable('payment_gateways'))
                {
                    Schema::create('payment_gateways', function (Blueprint $table) {
                        $table->id();
                        $table->unsignedInteger('workspace_id')->default(0);
                        $table->uuid();
                        $table->string('name')->nullable();
                        $table->string('api_name')->nullable();
                        $table->string('type')->nullable();
                        $table->string('slug')->nullable();
                        $table->string('username')->nullable();
                        $table->string('password')->nullable();
                        $table->string('api_key')->nullable();
                        $table->string('api_secret')->nullable();
                        $table->string('account')->nullable();
                        $table->text('description')->nullable();
                        $table->text('settings')->nullable();
                        $table->boolean('is_active')->default(true);
                        $table->boolean('is_default')->default(false);
                        $table->boolean('is_test_mode')->default(false);
                        $table->unsignedInteger('order')->default(0);
                        $table->timestamps();
                    });
                }

                if(!Schema::hasTable('transactions')) {
                    Schema::create('transactions', function (Blueprint $table) {
                        $table->id();
                        $table->uuid();
                        $table->unsignedInteger('workspace_id')->default(0);
                        $table->unsignedInteger('user_id')->default(0);
                        $table->unsignedInteger('gateway_id')->default(0);
                        $table->unsignedInteger('plan_id')->default(0);
                        $table->date('date')->nullable();
                        $table->string('transaction_id')->nullable();
                        $table->string('description')->nullable();
                        $table->decimal('amount', 10, 2)->default(0);
                        $table->decimal('fee', 10, 2)->default(0);
                        $table->decimal('tax', 10, 2)->default(0);
                        $table->decimal('total', 10, 2)->default(0);
                        $table->string('currency')->nullable();
                        $table->string('status')->nullable();
                        $table->string('type')->nullable();
                        $table->string('payment_method')->nullable();
                        $table->text('response')->nullable();
                        $table->text('notes')->nullable();
                        $table->timestamps();
                    });
                }

                if(!Schema::hasTable('posts')) {
                    Schema::create('posts', function (Blueprint $table) {
                        $table->id();
                        $table->uuid();
                        $table->unsignedInteger('workspace_id')->default(0);
                        $table->unsignedInteger('user_id')->default(0);
                        $table->unsignedInteger('parent_id')->default(0);
                        $table->unsignedInteger('collection_id')->default(0);
                        $table->unsignedInteger('single_category_id')->default(0);
                        $table->string('type', 100);
                        $table->string('template', 50)->nullable();
                        $table->string('header_type', 50)->nullable();
                        $table->string('api_name')->nullable();
                        $table->string('slug');
                        $table->string('name')->nullable();
                        $table->string('title');
                        $table->string('seo_title')->nullable();
                        $table->text('excerpt')->nullable();
                        $table->text('lead_text')->nullable();
                        $table->text('keywords')->nullable();
                        $table->text('meta_tag')->nullable();
                        $table->text('meta_description')->nullable();
                        $table->text('meta_keywords')->nullable();
                        $table->longText('markdown')->nullable();
                        $table->longText('content')->nullable();
                        $table->longText('head')->nullable();
                        $table->longText('js')->nullable();
                        $table->string('featured_image')->nullable();
                        $table->string('featured_video')->nullable();
                        $table->string('youtube_video_id')->nullable();
                        $table->string('vimeo_video_id')->nullable();
                        $table->string('canonical_url')->nullable();
                        $table->unsignedInteger('reading_time')->default(0);
                        $table->boolean('is_published')->default(0);
                        $table->boolean('is_home_page')->default(0);
                        $table->boolean('is_system_page')->default(0);
                        $table->boolean('is_pinned')->default(0);
                        $table->boolean('show_date')->default(1);
                        $table->boolean('allow_comment')->default(0);
                        $table->boolean('is_page')->default(0);
                        $table->unsignedInteger('author_id')->default(0);
                        $table->unsignedInteger('sort_order')->default(0);
                        $table->unsignedInteger('item_id')->default(0);
                        $table->boolean('is_cached')->default(0);
                        $table->boolean('seo_index')->default(1);
                        $table->json('settings')->nullable();
                        $table->string('og_title')->nullable();
                        $table->string('og_description')->nullable();
                        $table->string('og_image')->nullable();
                        $table->string('twitter_card')->nullable();
                        $table->string('twitter_title')->nullable();
                        $table->string('twitter_description')->nullable();
                        $table->string('twitter_image')->nullable();
                        $table->timestamps();

                    });
                }

                if(!Schema::hasTable('subscription_plans')) {
                    Schema::create('subscription_plans', function (Blueprint $table) {
                        $table->id();
                        $table->unsignedInteger('workspace_id')->default(0);
                        $table->uuid();
                        $table->string('name');
                        $table->string('slug')->nullable();
                        $table->string('paypal_plan_id')->nullable();
                        $table->string('stripe_plan_id')->nullable();
                        $table->unsignedDecimal('price_monthly')->nullable();
                        $table->unsignedDecimal('price_yearly')->nullable();
                        $table->unsignedDecimal('price_two_years')->nullable();
                        $table->unsignedDecimal('price_three_years')->nullable();
                        $table->text('description')->nullable();
                        $table->text('features')->nullable();
                        $table->text('modules')->nullable();
                        $table->unsignedInteger('maximum_allowed_users')->default(0);
                        $table->boolean('has_modules')->default(0);
                        $table->boolean('is_free')->default(0);
                        $table->boolean('is_active')->default(1);
                        $table->boolean('is_featured')->default(0);
                        $table->boolean('per_user_pricing')->default(0);
                        $table->unsignedInteger('users_limit')->default(0);
                        $table->unsignedInteger('max_file_upload_size')->default(0);
                        $table->unsignedInteger('file_space_limit')->default(0);
                        $table->timestamps();
                    });
                }

                if(!Schema::hasTable('subscription_plans')) {
                    Schema::create('subscription_plans', function (Blueprint $table) {
                        $table->id();
                        $table->uuid();
                        $table->unsignedInteger('workspace_id')->default(0);
                        $table->unsignedInteger('user_id')->default(0);
                        $table->unsignedInteger('gateway_id')->default(0);
                        $table->string('gateway_type')->nullable();
                        $table->string('token')->nullable();
                        $table->longText('log')->nullable();
                        $table->timestamps();
                    });
                }

            }
        }


    }

    public static function createPrimaryData($user)
    {
        $workspace_id = $user->workspace_id;

        add_activity($workspace_id, $user->first_name.' '.__('installed CloudOffice'), $user->id);

        # This is sample data, does not need to be translated

        $documents = [
            [
                'title' => 'Getting Started',
                'content' => '<h2>Getting Started</h2><p>Hey <strong>'.$user->first_name.'!</strong> </p><p>You have just installed CloudOffice. </p><p>It will help you to create, organize, and share your business and personal documents. </p><p>Make word documents and spreadsheets, edit images, quickly share files and screenshots, and more. </p><p>During your installation, the system created some sample documents to get to know your CloudOffice and its modules. This document and other documents generated during installation are sample documents. You may delete them.</p>',
            ],
            [
                'title' => 'Creating and Sharing Documents',
                'content' => 'You can create documents with rich editors and share them securely with auto-generated unique URLs. To get started, go to "Documents" and click "New Document" from the top right corner. After creating, click "Share," and you will get a unique URL secured by a randomly generated access key.',
            ],
            [
                'title' => 'Address Book',
                'content' => 'Keep all your business contacts in your address books. You can also create contacts via API. Go to "API" under Settings to generate API keys and guide.',
            ],
            [
                'title' => 'Quick Share',
                'content' => 'Quick share allows you to share zip files, images, and videos without expensive subscriptions, all with your brands. For example, you can instantly share a screenshot, video, or zip file without using a third-party service. It also automatically shows a preview of images and videos. ',
            ],
            [
                'title' => 'Editing an Image',
                'content' => 'Upload your images, and your master images will remain the same on your CloudOffice. Then you can edit them and download your changes.',
            ],
            [
                'title' => 'Sample Spreadsheet',
                'content' => '',
                'type' => 'spreadsheet',
            ]
        ];


        foreach ($documents as $create_document)
        {
            $document = new Document();
            $document->workspace_id = $workspace_id;
            $document->user_id = $user->id;
            $document->uuid = Str::uuid();
            $document->type = $create_document['type'] ?? 'word';
            $document->title = $create_document['title'];
            $document->content = $create_document['content'];
            $document->last_opened_by = $user->id;
            $document->last_opened_at = now();
            $document->access_key = Str::random(32);
            $document->save();
        }

        $default_settings = [
            'workspace_name' => config('app.name') ?? 'CloudOffice',
            'logo' => 'system/logo.png',
        ];

        foreach ($default_settings as $key => $value)
        {
            $setting = new Setting();
            $setting->workspace_id = $workspace_id;
            $setting->key = $key;
            $setting->value = $value;
            $setting->save();
        }

        $sample_contacts = [
            [
                'first_name' => 'Demo',
                'last_name' => 'Example',
                'title' => 'Sample Contact',
                'email' => 'demo@example.com',
                'notes' => 'This is a sample contact. You can delete it.',
            ],
        ];

        foreach ($sample_contacts as $create_contact)
        {
            $contact = new Contact();
            $contact->workspace_id = $workspace_id;
            $contact->uuid = Str::uuid();
            $contact->user_id = $user->id;
            $contact->first_name = $create_contact['first_name'];
            $contact->last_name = $create_contact['last_name'];
            $contact->title = $create_contact['title'];
            $contact->email = $create_contact['email'];
            $contact->notes = $create_contact['notes'];
            $contact->save();
        }

        $sample_media_files = [
            [
                'title' => 'Sample Image',
                'path' => 'media/sample-image.jpg',
                'mime_type' => 'image/jpeg',
                'extension' => 'jpg',
                'size' => 386925,
            ]
        ];

        foreach ($sample_media_files as $create_media_file)
        {
            $media_file = new MediaFile();
            $media_file->workspace_id = $workspace_id;
            $media_file->uuid = Str::uuid();
            $media_file->user_id = $user->id;
            $media_file->title = $create_media_file['title'];
            $media_file->path = $create_media_file['path'];
            $media_file->mime_type = $create_media_file['mime_type'];
            $media_file->extension = $create_media_file['extension'];
            $media_file->size = $create_media_file['size'];
            $media_file->save();
        }

        if(it_is_a_saas())
        {
            require lightPath('saas/primary-data.php');

            $function_name = config('app.uid').'_create_saas_primary_data';

            if(function_exists($function_name)) {
                $function_name($user);
            }

        }

    }

    public static function createDemoData($user)
    {
        if(it_is_a_saas())
        {
            require lightPath('saas/demo-data.php');

            $function_name = config('app.uid').'_create_saas_demo_data';

            if(function_exists($function_name)) {
                $function_name($user);
            }

        }
    }
}
