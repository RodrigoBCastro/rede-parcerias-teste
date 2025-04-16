<?php

namespace App\Application\Http\Actions\User;

use App\Domain\Services\User\UserGetAllService;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserGetAllAction
{
    public function __construct(
        private UserGetAllService $userService
    ) {
    }

    public function __invoke(): JsonResponse
    {
        return response()->json(
            ($this->userService)()
        );
    }
}
