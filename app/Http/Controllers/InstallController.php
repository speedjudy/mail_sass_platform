<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use App\Supports\InstallSupport;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class InstallController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $base_url = config('app.url') ?? $request->getSchemeAndHttpHost();
            View::share('base_url', $base_url);
            return $next($request);
        });
    }

    public function createUser($data)
    {
        $user = new User();
        $user->uuid = Str::uuid();
        $user->workspace_id = 1;
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->is_super_admin = $data['is_super_admin'] ?? 0;
        $user->save();
        return $user;
    }

    public function install(Request $request)
    {
        $step = $request->query('step', 1);

        if($step == 4)
        {
            #The final step
            //create a file named installed.php in storage/app folder
            $installed_file = storage_path('app/installed.php');
            if(!file_exists($installed_file)) {
                file_put_contents($installed_file, '<?php //installed'); # Empty file
            }
        }

        return view('office.install.index',[
            'step' => $step,
        ]);
    }

    public function saveDatabaseInfo(Request $request)
    {
        $request->validate([
            'database_host' => 'required|string|max:255',
            'database_name' => 'required|string|max:255',
            'database_username' => 'required|string|max:255',
            'database_password' => 'required|string|max:255',
        ]);

        $data = $request->all();

        $check_db_connection = check_db_connection(
            $data['database_host'],
            $data['database_name'],
            $data['database_username'],
            $data['database_password']
        );

        if(!empty($check_db_connection['error'])) {
            return response([
                'errors' => [
                    'database_connection' => $check_db_connection['error'],
                ],
            ],422);
        }

        edit_env_file([
            'DB_HOST' => $data['database_host'],
            'DB_DATABASE' => $data['database_name'],
            'DB_USERNAME' => $data['database_username'],
            'DB_PASSWORD' => $data['database_password'],
        ]);

        return response([
            'success' => true,
        ],200);

    }

    public function createDatabaseTables()
    {
        InstallSupport::createDatabaseTables();
    }

    public function savePrimaryData(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $is_super_admin = 0;

        if(it_is_a_saas())
        {
            $is_super_admin = 1;
        }

        $user = $this->createUser([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'is_super_admin' => $is_super_admin,
        ]);

        InstallSupport::createPrimaryData($user);

    }

    public function appRefresh()
    {
        if (app()->environment('local', 'demo')) {
            // drop all tables
            Schema::dropAllTables();
            InstallSupport::createDatabaseTables();
            $user = $this->createUser([
                'first_name' => 'Liam',
                'last_name' => 'P',
                'email' => 'demo@example.com',
                'password' => '123456',
                'is_super_admin' => it_is_a_saas() ? 1 : 0,
            ]);

            InstallSupport::createPrimaryData($user);

            InstallSupport::createDemoData($user);

            update_settings(1,[
                'l_key' => '2a7edda9e6c656fac238cc0322849929',
            ],true);


            update_settings(1,[
                'openai_api_key' => 'demo',
            ],true);

            return response([
                'success' => true,
            ],200);
        }

        abort(404);

    }
}
