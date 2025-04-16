<?php

namespace App\Domain\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getAll(array $visibleRoles): Collection;
    public function updateRoles(User $user, string $role): void;
}
