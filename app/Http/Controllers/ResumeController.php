<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResumeService;

class ResumeController extends Controller
{
    /**
     * Get resumes
     * @param \App\Services\ResumeService $resumeService
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(ResumeService $resumeService)
    {
        $result = $resumeService->get();

        return response()->json($result['data'], $result['code']);
    }
}
