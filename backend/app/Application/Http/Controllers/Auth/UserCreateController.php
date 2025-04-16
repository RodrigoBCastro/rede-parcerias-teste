<?php

namespace App\Application\Http\Controllers\Auth;

use App\Application\Requests\RegisterRequest;
use App\Domain\Services\Auth\RegisterService;
use App\Http\Controllers\Controller;

class UserCreateController extends Controller
{
    public function __construct(
        private RegisterService $registerService,
    ) {
    }

    public function __invoke(RegisterRequest $request)
    {
        $user = ($this->registerService)($request->validated());
        session(['jwt_token' => $user->getToken()]);

        return redirect()->route('products.index');
    }
}
