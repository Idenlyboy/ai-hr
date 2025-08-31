<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
        'resume_id',
        'question_id',
        'hit_id',
        'user_answer',
        'rate'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function hit()
    {
        return $this->belongsTo(Hit::class);
    }
}
