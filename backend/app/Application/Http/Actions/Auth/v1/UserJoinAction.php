<?php

namespace App\Application\Http\Actions\Auth\v1;

use App\Application\Requests\LoginRequest;
use App\Domain\Services\Auth\LoginService;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserJoinAction
{
    public function __construct(
        private LoginService $loginService,
    ) {
    }

    public function __invoke(LoginRequest $request): JsonResponse
    {
        $user = ($this->loginService)($request->validated());

        return response()->json($user->toArray(), 201);
    }
}
