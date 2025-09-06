<?php

use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VacationController;

Route::post('/login/', [AuthController::class, 'auth']);
Route::post('/logout/', [AuthController::class, 'logout']);
Route::post('/register/', [AuthController::class, 'register']);

Route::middleware('api.route.access')->group(function () {
    Route::post('/ai-process/vacation/{id}/', [AiController::class, 'aiProcess']);

    Route::post('/resume/get/', [ResumeController::class, 'get']);

    Route::post('/hunter-apply/', [VacationController::class, 'hunterApply']);
});
