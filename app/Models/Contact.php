<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    public static function getForWorkspace($workspace_id)
    {
        return self::where('workspace_id', $workspace_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public static function defaultValidationRules()
    {
        return [
            'id' => 'nullable|uuid',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ];
    }

    public static function getByUuid(int $workspace_id, $uuid)
    {
        return self::where('workspace_id', $workspace_id)
            ->where('uuid', $uuid)
            ->first();
    }
}
