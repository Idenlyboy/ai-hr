<?php

namespace App\Observers;

use App\Models\Hit;

class HitObserver
{
    /**
     * Handle the Hit "updated" event.
     *
     * @param  \App\Models\Hit  $hit
     * @return void
     */
    public function updated(Hit $hit)
    {
        if (!$hit->isDirty('hr_status') && !$hit->isDirty('hunter_status')) {
            return;
        }

        if ($hit->hr_status == 'approved' && $hit->hunter_status == 'approved') {
            $hit->update(['status' => 'interview']);
        }
    }
}
