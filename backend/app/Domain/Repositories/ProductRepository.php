<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(): Collection
    {
        return Product::orderBy('created_at', 'asc')->get();
    }

    public function getAllPaginated(int $perPage): LengthAwarePaginator
    {
        return Product::orderBy('created_at', 'asc')->paginate($perPage);
    }

    public function create(Product $product): Product
    {
        $product->save();

        return $product;
    }

    public function getByUuid(string $uuid): Product
    {
        return Product::findOrFail($uuid);
    }

    public function update(string $uuid, array $data): Product
    {
        $product = Product::findOrFail($uuid);
        $product->update($data);
        return $product;
    }

    public function delete(string $uuid): bool
    {
        return Product::destroy($uuid);
    }
}
