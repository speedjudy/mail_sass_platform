<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public static function listForSuperAdmin()
    {
        return self::all();
    }
}
