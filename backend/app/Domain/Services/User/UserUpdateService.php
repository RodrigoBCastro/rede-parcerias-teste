<?php

namespace App\Domain\Services\User;

use App\Domain\Models\User;
use App\Domain\Repositories\Contracts\UserRepositoryInterface;
use App\Support\RoleVisibility;
use Illuminate\Auth\Access\AuthorizationException;

class UserUpdateService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function __invoke(User $actingUser, User $targetUser, string $newRole): void
    {
        $currentRole = $actingUser->getRoleNames()->first();
        $allowedRoles = RoleVisibility::visibleRolesFor($currentRole);

        if (!in_array($newRole, $allowedRoles)) {
            throw new AuthorizationException("Você não tem permissão para atribuir esta role.");
        }

        $this->userRepository->updateRoles($targetUser, $newRole);
    }
}
