<?php

namespace App\Domain\Services\Product;

use App\Assembler\Product\ProductRequestDtoToProductAssembler;
use App\Assembler\Product\ProductToProductResponseDtoAssembler;
use App\Domain\DTO\ProductRequestDto;
use App\Domain\DTO\ProductResponseDto;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;

class ProductCreateService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(ProductRequestDto $productRequestDto): ProductResponseDto
    {
        $product = (new ProductRequestDtoToProductAssembler())($productRequestDto);


        $this->productRepository->create($product);

        return (new ProductToProductResponseDtoAssembler())($product);
    }
}
