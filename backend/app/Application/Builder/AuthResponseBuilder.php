<?php

namespace App\Application\Builder;

use App\Domain\DTO\AuthResponseDto;
use App\Models\User;

class AuthResponseBuilder
{
    public function __invoke(User $user, string $token): AuthResponseDTO
    {
        return new AuthResponseDTO(
            name: $user->name,
            role: $user->getRoleNames()->first() ?? 'no-role',
            token: $token
        );
    }
}
