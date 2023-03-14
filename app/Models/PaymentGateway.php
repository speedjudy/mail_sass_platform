<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    public static function getByApiName($workspace_id, $api_name)
    {
        return self::where('workspace_id', $workspace_id)->where('api_name', $api_name)->first();
    }

    public static function getForWorkspace($workspace_id)
    {
        return self::where('workspace_id', $workspace_id)->get();
    }
}
