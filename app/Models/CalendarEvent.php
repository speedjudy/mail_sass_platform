<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{

    public static function getById($workspace_id, $id)
    {
        return self::where('workspace_id', $workspace_id)
            ->where('id', $id)
            ->first();
    }

    public static function getByUuid($workspace_id, $uuid)
    {
        return self::where('workspace_id', $workspace_id)
            ->where('uuid', $uuid)
            ->first();
    }
}
