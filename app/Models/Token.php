<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'value',
        'role',
        'user_id',
    ];
}
