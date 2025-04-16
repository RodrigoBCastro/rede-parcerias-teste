<?php

namespace App\Application\Http\Actions\Auth\v1;

use Symfony\Component\HttpFoundation\JsonResponse;

class UserExitAction
{
    public function __invoke(): JsonResponse
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
