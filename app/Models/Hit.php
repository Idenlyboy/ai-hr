<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
    protected $fillable = [
        'vacation_id',
        'resume_id',
        'strength',
        'hr_status',
        'hunter_status',
        'status',
    ];

    public function vacation()
    {
        return $this->belongsTo(Vacation::class);
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
