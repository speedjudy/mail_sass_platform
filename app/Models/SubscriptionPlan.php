<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $casts = [
        'features' => 'array',
        'modules' => 'array',
    ];
    public static function listForSuperAdmin()
    {
        return self::all();
    }

    public static function getByUuid(int $workspace_id, $plan_id)
    {
        return self::where('workspace_id', $workspace_id)->where('uuid', $plan_id)->first();
    }
}
