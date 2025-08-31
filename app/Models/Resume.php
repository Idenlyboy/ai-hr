<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id',
        'vacation_id',
        'name',
        'lastname',
        'surname',
        'date_of_birth',
        'description',
        'file',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacation()
    {
        return $this->belongsTo(Vacation::class);
    }

    public function hits()
    {
        return $this->hasMany(Hit::class);
    }

    public function checks()
    {
        return $this->hasMany(Check::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'vacation_skills', 'resume_id', 'skill_id');
    }
}
