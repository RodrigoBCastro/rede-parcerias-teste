<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Session;

class JwtWebAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $token = Session::get('jwt_token');

            if (!$token) {
                return redirect()->route('login');
            }

            JWTAuth::setToken($token)->authenticate();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
