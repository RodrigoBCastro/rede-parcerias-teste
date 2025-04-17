<?php

namespace App\Domain\Repositories;

use App\Domain\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(array $visibleRoles): Collection
    {
        return User::whereHas('roles', function ($query) use ($visibleRoles) {
            $query->whereIn('name', $visibleRoles);
        })->orderBy('id')->get();
    }

    public function updateRoles(User $user, string $role): void {
        $user->syncRoles([$role]);
    }
}
