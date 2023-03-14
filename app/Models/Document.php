<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $casts = [
        'last_opened_at' => 'datetime',
    ];

    public static function getByUuid($workspace_id, $uuid)
    {
        return self::where('workspace_id', $workspace_id)
            ->where('uuid', $uuid)
            ->first();
    }

    public static function defaultSelect()
    {
        return [
            'id',
            'uuid',
            'user_id',
            'title',
            'access_key',
            'last_opened_by',
            'last_opened_at',
            'created_at',
            'updated_at',
        ];
    }
    public static function getForWorkspace($workspace_id, $type = null)
    {
        $documents = Document::where('workspace_id', $workspace_id)
            ->select(self::defaultSelect());
        if($type)
        {
            $documents = $documents->where('type', $type);
        }
        return $documents->orderBy('updated_at', 'desc')
            ->get();
    }

    public static function getRecentDocuments($workspace_id, $type = null, $limit = 4)
    {
        $documents = Document::where('workspace_id', $workspace_id)
            ->select(self::defaultSelect());
        if($type)
        {
            $documents = $documents->where('type', $type);
        }
        return $documents->orderBy('last_opened_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
