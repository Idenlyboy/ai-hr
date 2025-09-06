<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VacationService;
use App\Http\Requests\VacationRequest;

class VacationController extends Controller
{
    /**
     * Get public Vacation page
     * @param mixed $id
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id, VacationService $vacationService)
    {
        return view('', $vacationService->getByID($id));
    }

    /**
     * Get public Vacations List page
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Contracts\View\View
     */
    public function index(VacationService $vacationService)
    {
        return view('vacation.index', [
            'vacations' => $vacationService->paginate()
        ]);
    }

    /**
     * Get board Vacations List page
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Contracts\View\View
     */
    public function list(VacationService $vacationService)
    {
        return view('', [
            'vacations' => $vacationService->paginate()
        ]);
    }

    /**
     * Get Vacation create page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view();
    }

    /**
     * Get Vacation edit page
     * @param mixed $id
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id = null, VacationService $vacationService)
    {
        $data = [
            'vacation' => [],
        ];

        if (!is_null($id)) {
            $data['vacation'] = $vacationService->getByID($id);
        }

        return view('', $data);
    }

    public function hunterApply(Request $request, VacationService $vacationService)
    {
        $result = $vacationService->hunterApply($request);

        return response()->json($result['data'], $result['code']);
    }

    /**
     * Store Vacation
     * @param \App\Http\Requests\VacationRequest $request
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(VacationRequest $request, VacationService $vacationService)
    {
        $result = $vacationService->store($request);

        return response()->json($result['data'], $result['code']);
    }

    /**
     * Update Vacation by ID
     * @param mixed $id
     * @param \App\Http\Requests\VacationRequest $request
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, VacationRequest $request, VacationService $vacationService)
    {
        $result = $vacationService->update($id, $request);

        return response()->json($result['data'], $result['code']);
    }

    /**
     * Destroy Vacation by ID
     * @param mixed $id
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, VacationService $vacationService)
    {
        $result = $vacationService->destroy($id);

        return response()->json($result['data'], $result['code']);
    }
}
