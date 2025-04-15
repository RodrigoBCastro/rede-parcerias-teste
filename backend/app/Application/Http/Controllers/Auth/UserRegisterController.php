<?php

namespace App\Application\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class UserRegisterController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Auth/Register');
    }
}
