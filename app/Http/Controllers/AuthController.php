<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Login page
     * @return \Illuminate\Contracts\View\View | \Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        if (Session::has('token')) {
            return redirect(route('home.page'));
        }
        return view('auth.login');
    }

    /**
     * Login admin page
     * @return \Illuminate\Contracts\View\View | \Illuminate\Http\RedirectResponse
     */
    public function loginAdmin()
    {
        if (Session::has('token')) {
            return redirect(route('home.page'));
        }

        return view('auth.admin.login');
    }

    /**
     * User registration page
     * @return \Illuminate\Contracts\View\View
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * User register
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRegRequest $request, AuthService $authService)
    {
        return response()->json($authService->register($request));
    }

    /**
     * Authenticate user
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth(LoginRequest $request, AuthService $authService)
    {
        return response()->json($authService->login($request));
    }

    /**
     * Logout user
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(AuthService $authService)
    {
        return response()->json($authService->logout());
    }
}
