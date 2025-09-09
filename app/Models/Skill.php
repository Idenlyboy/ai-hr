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
        return $this->belongsToMany(Vacation::class, 'vacation_skills', 'skill_id', 'vacation_id');
    }

    public function resumes()
    {
        return $this->belongsToMany(Resume::class, 'resume_skills', 'skill_id', 'resume_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
