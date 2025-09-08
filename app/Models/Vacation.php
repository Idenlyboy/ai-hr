<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'question_count',
        'difficulty',
        'description',
        'speach_kit',
        'file',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }

    public function hits()
    {
        return $this->hasMany(Hit::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'vacation_skills');
    }
}
