<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home.page');


Route::get('/login/', [AuthController::class, 'login'])->name('login.page');
Route::get('/admin/login/', [AuthController::class, 'loginAdmin'])->name('login.admin.page');

Route::get('/registration/', [AuthController::class, 'registration'])->name('user.registration');

Route::middleware('web.route.access')->group(function () {

});