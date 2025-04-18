<?php

namespace App\Assembler\Product;

use App\Domain\DTO\UserResponseDto;
use App\Domain\Models\User;

class UserToUserResponseDtoAssembler
{
    public function __invoke(User $user): UserResponseDto
    {
        return new UserResponseDto(
            $user->id,
            $user->name,
            $user->getRoleNames()->first(),
            $user->email,
        );
    }
}
