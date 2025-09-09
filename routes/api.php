<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\HitController;
use Illuminate\Support\Facades\Route;

Route::post('/login/', [AuthController::class, 'auth']);
Route::post('/logout/', [AuthController::class, 'logout']);
Route::post('/register/', [AuthController::class, 'register']);

Route::middleware('api.route.access')->group(function () {
    Route::post('/ai-process/vacation/{id}/', [AiController::class, 'vacationProcess']);

    Route::post('/resume/get/', [ResumeController::class, 'get']);

    Route::post('/hunter-apply/', [VacationController::class, 'hunterApply']);

    Route::resource('/vacation', VacationController::class)->except(['create', 'edit', 'show']);

    Route::resource('/hit', HitController::class)->except(['store', 'create', 'edit', 'show']);
    Route::post('/hit-set-status/{id}/', [HitController::class, 'updateStatus']);
});

// Webhook routes
Route::middleware('webhook.route.access')->group(function () {
    Route::post('/vacation/{id}/set-tags', [WebhookController::class, 'setVacationTags'])->name('webhook.vacation.set-tags');
});
