<?php

namespace App\Domain\Services\Product;

use App\Assembler\Product\ProductToProductResponseDtoAssembler;
use App\Domain\DTO\ProductResponseDto;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductGetByIdService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(string $uuid): ProductResponseDto
    {
        $product = $this->productRepository->getByUuid($uuid);

        return (new ProductToProductResponseDtoAssembler())($product);
    }
}
