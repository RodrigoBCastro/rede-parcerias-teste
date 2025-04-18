<?php

namespace App\Domain\Repositories\Contracts;

use App\Domain\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getAll(array $visibleRoles): Collection;
    public function getAllPaginatedExceptLoggedUser(int $perPage, array $visibleRoles, int $idUser): LengthAwarePaginator;
    public function updateRoles(User $user, string $role): void;
}
