<?php

namespace App\Domain\Services\Product;

use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductGetAllService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(): array
    {
        return $this->productRepository->getAll()->toArray();
    }
}
