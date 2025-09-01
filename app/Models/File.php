<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name',
        'entity',
        'entity_id',
        'user_id',
    ];

    public function getOwnerID()
    {
        return $this->user_id;
    }
}
