<?php

namespace App\Domain\Services\Product;

use App\Assembler\Product\ProductToProductResponseDtoAssembler;
use App\Domain\DTO\ProductResponseDto;
use App\Domain\Models\Product;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductGetByIdService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(int $id): ProductResponseDto
    {
        $product = $this->productRepository->getById($id);

        return (new ProductToProductResponseDtoAssembler())($product);
    }
}
