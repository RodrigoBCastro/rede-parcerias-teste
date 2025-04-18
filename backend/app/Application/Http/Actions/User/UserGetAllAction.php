<?php

namespace App\Application\Http\Actions\User;

use App\Domain\Services\User\UserGetAllService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserGetAllAction
{
    public function __construct(
        private UserGetAllService $userService
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $perPage = min((int) $request->get('limit', 10), 100);
        $page = $request->get('page', 1);

        return response()->json(
            ($this->userService)($perPage, $page)
        );
    }
}
