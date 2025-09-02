<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login/', [AuthController::class, 'auth']);
Route::post('/logout/', [AuthController::class, 'logout']);
Route::post('/register/', [AuthController::class, 'register']);