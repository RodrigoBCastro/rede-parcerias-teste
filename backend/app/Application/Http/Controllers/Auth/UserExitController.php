<?php

namespace App\Application\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserExitController extends Controller
{
    public function __invoke(Request $request)
    {
        auth()->logout();

        $request->session()->forget('jwt_token');

        return Inertia::location(route('login'));
    }
}
