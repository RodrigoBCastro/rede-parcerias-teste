<?php

namespace App\Domain\Services\Auth;

use App\Application\Builder\AuthResponseBuilder;
use App\Domain\DTO\AuthResponseDto;
use App\Domain\Repositories\Contracts\AuthRepositoryInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterService
{
    public function __construct(
        private AuthRepositoryInterface $authRepository
    ) {
    }

    public function __invoke(array $data): AuthResponseDto
    {
        $data['password'] = bcrypt($data['password']);

        $user = $this->authRepository->create($data);

        $user->assignRole('common');

        $token = JWTAuth::fromUser($user);

        return (new AuthResponseBuilder())($user, $token);
    }
}
