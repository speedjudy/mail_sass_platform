<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SystemController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actions(Request $request, $action)
    {

        $this->authCheck();

        switch ($action)
        {
            case 'activate':

                $response = Http::withOptions([
                    'verify' => false,
                ])->post('https://www.cloudonex.com/api/app-registration-flow',[
                    'item_id' => config('app.item_id'),
                    'uid' => config('app.uid'),
                    'first_name' => $this->user->first_name,
                    'last_name' => $this->user->last_name,
                    'ip' => get_client_ip(),
                    'email' => $this->user->email,
                    'url' => $this->base_url,
                ])->json();

                if(!empty($response['url']))
                {
                    return redirect($response['url']);
                }

                return redirect()->back()->with('error',__('Something went wrong! Please try again later!'));

                break;

            case 'set-license-key':

                $request->validate([
                    'license_key' => 'required',
                ]);

                $license_key = $request->license_key;

                update_settings(1,[
                    'l_key' => $license_key,
                ],true);

                return redirect($this->base_url.'/super-admin/dashboard')->with('success',__('License key updated successfully!'));


                break;
        }

    }

    public function actionsStore(Request $request, $action)
    {
        switch ($action)
        {
            case 'lc-check':

                $license_key = $this->super_settings['l_key'] ?? null;

                if(!$license_key)
                {
                    return response([
                        'success' => false,
                        'action' => 'require-license-key',
                    ]);
                }

                if(app_l_validate($this->base_url,$license_key))
                {
                    return response([
                        'success' => true,
                    ]);
                }

                return response([
                    'success' => true,
                ]);

                break;

        }
    }

}
