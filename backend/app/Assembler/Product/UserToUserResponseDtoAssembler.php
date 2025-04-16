<?php

namespace App\Assembler\Product;

use App\Domain\DTO\UserResponseDto;
use App\Models\User;

class UserToUserResponseDtoAssembler
{
    public function __invoke(User $user): UserResponseDto
    {
        return new UserResponseDto(
            $user->name,
            $user->getRoleNames()->first(),
            $user->email,
        );
    }
}
