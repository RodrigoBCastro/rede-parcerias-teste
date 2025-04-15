<?php

namespace App\Domain\Repositories\Contracts;

use App\Domain\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface AuthRepositoryInterface
{
    public function create(array $data): mixed;
    public function findByEmail(string $email): mixed;
}
