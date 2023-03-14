<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    public static function listForSuperAdmin()
    {
        return self::all();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
