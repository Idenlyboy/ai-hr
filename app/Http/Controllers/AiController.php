<?php

namespace App\Http\Controllers;

use App\Services\AiService;
use Illuminate\Http\Request;

class AiController extends Controller
{
    public function vacationProcess($id, AiService $aiService)
    {
        $result = $aiService->vacationProcess($id);

        return response()->json($result['data'], $result['code']);
    }
}
