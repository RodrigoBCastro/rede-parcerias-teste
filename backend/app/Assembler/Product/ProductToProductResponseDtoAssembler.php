<?php

namespace App\Assembler\Product;

use App\Domain\DTO\ProductResponseDto;
use App\Domain\Models\Product;

class ProductToProductResponseDtoAssembler
{
    public function __invoke(Product $product): ProductResponseDto
    {
        return new ProductResponseDto(
            $product->uuid,
            $product->name,
            $product->description,
            $product->quantity,
            $product->price,
            $product->category,
            $product->sku,
            $product->created_at,
            $product->updated_at,
        );
    }
}
