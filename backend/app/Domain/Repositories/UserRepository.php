<?php

namespace App\Domain\Repositories;

use App\Domain\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Domain\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(array $visibleRoles): Collection
    {
        return User::whereHas('roles', function ($query) use ($visibleRoles) {
            $query->whereIn('name', $visibleRoles);
        })->orderBy('id')->get();
    }

    public function getAllPaginatedExceptLoggedUser(int $perPage, array $visibleRoles, int $idUser): LengthAwarePaginator
    {
        return User::where('id', '!=', $idUser)
            ->whereHas('roles', function ($query) use ($visibleRoles) {
                $query->whereIn('name', $visibleRoles);
            })
            ->orderBy('id')
            ->paginate($perPage);
    }

    public function updateRoles(User $user, string $role): void {
        $user->syncRoles([$role]);
    }
}
