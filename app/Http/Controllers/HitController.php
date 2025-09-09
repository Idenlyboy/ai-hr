<?php

namespace App\Http\Controllers;

use App\Services\AiService;
use App\Services\HitService;
use Illuminate\Http\Request;

class HitController extends Controller
{
    public function interviewPage($id, AiService $aiService)
    {
        $url = $aiService->getInterviewPage($id);

        return redirect($url);
    }

    /**
     * Get Hits page
     * @param \App\Services\HitService $hitService
     * @return \Illuminate\Contracts\View\View
     */
    public function index(HitService $hitService)
    {
        $result = $hitService->paginate();

        return view('hit.index', ['hits' => $result]);
    }

    /**
     * Update Hit by ID
     * @param mixed $id
     * @param \App\Http\Requests\HitRequest $request
     * @param \App\Services\HitService $hitService
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, HitRequest $request, HitService $hitService)
    {
        $result = $hitService->update($id, $request);

        return response()->json($result['data'], $result['code']);
    }

    /**
     * Update Hit status by ID
     * @param mixed $id
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\HitService $hitService
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus($id, Request $request, HitService $hitService)
    {
        $result = $hitService->updateStatus($id, $request);

        return response()->json($result['data'], $result['code']);
    }

    /**
     * Destroy Hit by ID
     * @param mixed $id
     * @param \App\Services\HitService $hitService
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, HitService $hitService)
    {
        $result = $hitService->destroy($id);

        return response()->json($result['data'], $result['code']);
    }
}
