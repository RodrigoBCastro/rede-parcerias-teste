<?php

namespace App\Domain\Services\Product;

use App\Assembler\Product\ProductToProductResponseDtoAssembler;
use App\Domain\DTO\ProductRequestDto;
use App\Domain\DTO\ProductResponseDto;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductUpdateService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(int $id, ProductRequestDto $productRequestDto): ProductResponseDto
    {
        $product = $this->productRepository->update($id, $productRequestDto->toArray());

        return (new ProductToProductResponseDtoAssembler())($product);
    }
}
