<?php

namespace App\Application\Http\Controllers\Auth;

use App\Application\Requests\LoginRequest;
use App\Domain\Services\Auth\LoginService;
use App\Http\Controllers\Controller;

class UserJoinController extends Controller
{
    public function __construct(
        private LoginService $loginService,
    ) {
    }

    public function __invoke(LoginRequest $request)
    {
        $user = ($this->loginService)($request->validated());
        session(['jwt_token' => $user->getToken()]);

        return redirect()->route('products.index');
    }
}
