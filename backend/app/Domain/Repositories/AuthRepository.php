<?php

namespace App\Domain\Repositories;

use App\Domain\Models\User;
use App\Domain\Repositories\Contracts\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function create(array $data): mixed
    {
        return User::create($data);
    }

    public function findByEmail(string $email): mixed
    {
        return User::where('email', $email)->first();
    }
}
