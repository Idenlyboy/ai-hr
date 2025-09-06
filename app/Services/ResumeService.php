<?php

namespace App\Services;

use App\NoticeTrait;
use App\Models\Resume;
use Illuminate\Support\Facades\Session;

class ResumeService
{
    use NoticeTrait;

    /**
     * Get resumes
     * @return array{code: mixed, data: array{data: mixed, message: mixed}}
     */
    public function get()
    {
        $userID = Session::get('user_id');
        $userRole = Session::get('role');

        $resumes = Resume::where('status', 'published');

        if ($userRole === 'hunter') {
            $resumes = $resumes->where('user_id', $userID);
        }

        return $this->notice(200, 'Успешно!', $resumes->get());
    }
}