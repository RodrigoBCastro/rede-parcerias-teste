<?php

namespace App\Domain\Services\Product;

use App\Assembler\Product\ProductToProductResponseDtoAssembler;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductGetAllService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(): array
    {
        $products = $this->productRepository->getAll();

        return $products->map(fn($product) =>
            (new ProductToProductResponseDtoAssembler())($product)->toArray()
        )->all();
    }
}
