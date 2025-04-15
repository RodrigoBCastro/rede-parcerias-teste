<?php

namespace App\Domain\Services\Auth;

use App\Application\Builder\AuthResponseBuilder;
use App\Domain\DTO\AuthResponseDto;
use App\Domain\Exceptions\UnauthorizedException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginService
{
    public function __invoke(array $credentials): AuthResponseDto
    {
        if (!$token = JWTAuth::attempt($credentials)) {
            throw new UnauthorizedException();
        }

        $user = auth()->user();

        return (new AuthResponseBuilder())($user, $token);
    }
}
