<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Product;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(): Collection
    {
        return Product::orderBy('id', 'asc')->get();
    }

    public function create(Product $product): Product
    {
        $product->save();

        return $product;
    }

    public function getById(int $id): Product
    {
        return Product::findOrFail($id);
    }

    public function update(int $id, array $data): Product
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id): bool
    {
        return Product::destroy($id);
    }
}
