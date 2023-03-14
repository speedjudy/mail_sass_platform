<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickShare extends Model
{
    use HasFactory;

    public static function getByUuid($workspace_id, $uuid)
    {
        return self::where('workspace_id', $workspace_id)
            ->where('uuid', $uuid)
            ->first();
    }

    public static function getForWorkspace(int $workspace_id)
    {
        return self::where('workspace_id', $workspace_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
