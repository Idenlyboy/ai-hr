<?php

namespace App\Http\Controllers;

use App\Services\WebhookService;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function setVacationTags($id, Request $request, WebhookService $webhookService)
    {
        $result = $webhookService->setVacationTags($id, $request);

        return response()->json($result['data'], $result['code']);
    }
}
