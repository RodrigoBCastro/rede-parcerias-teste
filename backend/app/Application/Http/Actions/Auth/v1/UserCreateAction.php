<?php

namespace App\Application\Http\Actions\Auth\v1;

use App\Application\Requests\RegisterRequest;
use App\Domain\Services\Auth\RegisterService;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserCreateAction
{
    public function __construct(
        private RegisterService $registerService,
    ) {
    }

    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $user = ($this->registerService)($request->validated());

        return response()->json($user->toArray(), 201);
    }
}
