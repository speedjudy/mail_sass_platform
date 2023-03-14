<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use App\Models\User;
use App\Models\Workspace;
use App\Supports\DataHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected $base_url;
    protected $user;
    protected $user_id;
    protected $workspace_id = 0;
    protected $workspace = null;
    protected $users;
    protected $settings;
    protected $super_settings;
    protected $saas = false;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $base_url = config('app.url') ?? $request->getSchemeAndHttpHost();
            $this->base_url = $base_url;

            if (session()->has('user_id')) {
                $user_id = session()->get('user_id');
                $user = User::find($user_id);
                if ($user) {
                    $this->user = $user;
                    $this->user_id = $user_id;
                    $this->workspace_id = $user->workspace_id;
                    View::share('user', $this->user);
                    $this->users = User::getForWorkspace($this->workspace_id);
                    View::share('users', $this->users);
                    $this->settings = settings_loader($this->workspace_id);
                    View::share('settings', $this->settings);
                }
            }

            $this->super_settings = settings_loader(1);
            View::share('super_settings', $this->super_settings);
            View::share('base_url', $this->base_url);
            $this->saas = it_is_a_saas();
            View::share('saas', $this->saas);

            if ($this->saas) {
                $this->workspace = Workspace::find($this->workspace_id);
            }

            View::share('workspace', $this->workspace);

            return $next($request);
        });
    }

    /**
     * Purify data
     * @param $data
     * @return mixed
     */
    protected function purify($data)
    {
        return (new DataHandler($data))->purify()
            ->all();
    }

    protected function authCheck()
    {
        if (!$this->user_id) {
            header('Location: ' . $this->base_url . '/office/login');
            exit;
        }
    }

    protected function isSuperAdmin()
    {
        if($this->user && $this->user->is_super_admin)
        {
            return;
        }
        header('Location: ' . $this->base_url . '/super-admin/login');
        exit;
    }



    protected function apiCheck($api_key)
    {
        $api_key_object = ApiKey::where('key', $api_key)
            ->first();
        if ($api_key_object) {
            $this->user_id = $api_key_object->user_id;
            $this->user = User::find($this->user_id);
            $this->workspace_id = $this->user->workspace_id;
            $this->users = User::getForWorkspace($this->workspace_id);
            $this->settings = settings_loader($this->workspace_id);
        } else {
            api_response([
                'status' => 'error',
                'message' => 'Invalid API Key'
            ], 401);
        }
    }

    protected function isDemo()
    {
        if (config('app.env') === 'demo') {
            return true;
        }
        return false;
    }

    protected function isSaaS()
    {
        return it_is_a_saas();
    }
}
