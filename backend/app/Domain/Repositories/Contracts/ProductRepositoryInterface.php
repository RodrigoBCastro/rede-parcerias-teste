<?php

namespace App\Domain\Repositories\Contracts;

use App\Domain\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;
    public function create(Product $product): Product;
    public function getById(int $id): Product;
    public function update(int $id, array $data): Product;
    public function delete(int $id): bool;
}
