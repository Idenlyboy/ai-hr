<?php

namespace App\Http\Controllers;

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
        return view('', $vacationService->paginate());
    }

    /**
     * Get board Vacations List page
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Contracts\View\View
     */
    public function list(VacationService $vacationService)
    {
        return view('', $vacationService->paginate());
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
    public function edit($id, VacationService $vacationService)
    {
        return view('', $vacationService->getByID($id));
    }

    /**
     * Store Vacation
     * @param \App\Http\Requests\VacationRequest $request
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(VacationRequest $request, VacationService $vacationService)
    {
        return response()->json($vacationService->store($request));
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
        return response()->json($vacationService->update($id, $request));
    }

    /**
     * Destroy Vacation by ID
     * @param mixed $id
     * @param \App\Services\VacationService $vacationService
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, VacationService $vacationService)
    {
        return response()->json($vacationService->destroy($id));
    }
}
