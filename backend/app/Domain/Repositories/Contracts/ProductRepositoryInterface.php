<?php

namespace App\Domain\Repositories\Contracts;

use App\Domain\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;
    public function getAllPaginated(int $perPage): LengthAwarePaginator;
    public function create(Product $product): Product;
    public function getByUuid(string $uuid): Product;
    public function update(string $uuid, array $data): Product;
    public function delete(string $uuid): bool;
}
