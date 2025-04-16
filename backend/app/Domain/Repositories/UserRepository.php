<?php

namespace App\Domain\Repositories;

use App\Domain\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): Collection
    {
        return User::orderBy('id', 'asc')->get();
    }
}
