<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'title',
        'description',
        'docs_url'
    ];

    public function vacations()
    {
        return $this->belongsToMany(Vacation::class, 'vacation_skills');
    }

    public function resumes()
    {
        return $this->belongsToMany(Resume::class, 'vacation_skills');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
