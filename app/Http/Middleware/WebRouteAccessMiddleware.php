<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class WebRouteAccessMiddleware
{
    protected $accessConfig;

    public function __construct()
    {
        $this->accessConfig = config('web-access');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Session::has('token')) {
            return redirect()->route('login.page');
        }

        $userID = Session::get('user_id');
        $sessionToken = Session::get('token');

        $auth = Token::where('value', $sessionToken)->first();

        if (!$auth || $auth->user_id !== $userID) {
            Session::forget('token');
            Session::forget('user_id');
            Session::forget('role');

            return redirect()->route('login.page');
        }

        $user = User::find($userID);

        if (!$user || $user->status !== 'active') {
            Session::forget('token');
            Session::forget('user_id');
            Session::forget('role');

            return redirect()->route('login.page');
        }

        $route = rtrim($request->getPathInfo(), '/') . '/';

        if (!$this->check($route, $auth->role)) {
            return redirect()->route('login.page');
        }

        return $next($request);
    }

    private function check($route, $role)
    {
        $access = $this->accessConfig[$role]['access'];

        if ($access === 'full') {
            return true;
        }

        if ($access === 'limited') {
            $routes = $this->accessConfig[$role]['routes'];

            foreach ($routes as $allowedRoute) {
                $pattern = preg_replace('/{(\w+)}/', '([^/]+)', $allowedRoute);
                $pattern = '#^' . $pattern . '$#';

                if (preg_match($pattern, $route)) {
                    return true;
                }
            }
        }

        return false;
    }
}
