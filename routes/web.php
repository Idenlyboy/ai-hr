<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HitController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VacationController;

Route::get('/', function () {
    return view('welcome');
})->name('home.page');


Route::get('/login/', [AuthController::class, 'login'])->name('login.page');
Route::get('/admin/login/', [AuthController::class, 'loginAdmin'])->name('login.admin.page');
Route::get('/logout/', [AuthController::class, 'authLogout'])->name('auth.logout');

Route::get('/registration/', [AuthController::class, 'registration'])->name('user.registration');

Route::get('/vacations/', [VacationController::class, 'index'])->name('vacation.page');

// Auth routes
Route::middleware('web.route.access')->group(function () {
    Route::get('/vacation/edit/{id?}', [VacationController::class, 'edit'])->name('vacation.edit');

    Route::get('/hits/', [HitController::class, 'index'])->name('hit.page');

    Route::get('/profile', function () {
        $role = Session::get('role');
        return view('profile.' . $role);
    })->name('user.profile');

    Route::get('/interview/hit/{id}/', [HitController::class, 'interviewPage'])->name('interview.page');
});