<?php

namespace App\Domain\Services\User;

use App\Assembler\Product\UserToUserResponseDtoAssembler;
use App\Domain\Repositories\Contracts\UserRepositoryInterface;
use App\Support\RoleVisibility;

class UserGetAllService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function __invoke(): array
    {
        $user = auth()->user();

        $visibleRoles = RoleVisibility::visibleRolesFor($user->getRoleNames()->first());

        $users = $this->userRepository->getAll($visibleRoles);

        return $users->map(fn($user) =>
            (new UserToUserResponseDtoAssembler())($user)->toArray()
        )->all();
    }
}
