<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{

    public static function getByUuid($workspace_id, $uuid)
    {
        return self::where('workspace_id', $workspace_id)
            ->where('uuid', $uuid)
            ->first();
    }
    public static function getForWorkspace($workspace_id, $type = null)
    {
        $query = self::where('workspace_id', $workspace_id);
        if($type)
        {
            if($type === 'image')
            {
                $query->where('mime_type','like','image/%');
            }
            else if($type === 'video')
            {
                $query->where('mime_type','like','video/%');
            }
            else if($type === 'audio')
            {
                $query->where('mime_type','like','audio/%');
            }
            else if($type === 'document')
            {
                $query->where('mime_type','like','application/%');
            }
        }
        return $query->get();
    }

    public static function listForSuperAdmin()
    {
        return self::all();
    }
}
