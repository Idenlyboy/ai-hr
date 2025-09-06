<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Get Login page
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
     * Get Login admin page
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
     * Get User registration page
     * @return \Illuminate\Contracts\View\View
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Register User 
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRegRequest $request, AuthService $authService)
    {
        $result = $authService->register($request);

        return response()->json($result['data'], $result['code']);
    }

    /**
     * Authenticate User
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth(LoginRequest $request, AuthService $authService)
    {
        $result = $authService->login($request);

        return response()->json($result['data'], $result['code']);
    }

    /**
     * Logout User
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(AuthService $authService)
    {
        $result = $authService->logout();

        return response()->json($result['data'], $result['code']);
    }

    /**
     * Logout User for http request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authLogout(AuthService $authService)
    {
        $authService->logout();

        return redirect('/');
    }
}
