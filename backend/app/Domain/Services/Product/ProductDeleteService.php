<?php

namespace App\Domain\Services\Product;

use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductDeleteService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(int $id): void
    {
        $this->productRepository->delete($id);
    }
}
