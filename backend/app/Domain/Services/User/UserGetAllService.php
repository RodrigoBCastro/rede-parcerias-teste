<?php

namespace App\Domain\Services\User;

use App\Assembler\Product\UserToUserResponseDtoAssembler;
use App\Domain\Repositories\Contracts\UserRepositoryInterface;

class UserGetAllService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function __invoke(): array
    {
        $users = $this->userRepository->getAll();

        return $users->map(fn($user) =>
            (new UserToUserResponseDtoAssembler())($user)->toArray()
        )->all();
    }
}
