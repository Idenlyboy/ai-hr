<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'skill_id',
        'text',
        'answer',
        'difficulty',
        'status',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function checks()
    {
        return $this->hasMany(Check::class);
    }
}
