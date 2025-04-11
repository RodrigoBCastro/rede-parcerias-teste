<?php

namespace App\Assembler\Product;

use App\Domain\DTO\ProductRequestDto;
use App\Domain\Models\Product;

class ProductRequestDtoToProductAssembler
{
    public function __invoke(ProductRequestDto $productRequestDto): Product
    {
        $product = new Product();
        $product->name = $productRequestDto->getName();
        $product->description = $productRequestDto->getDescription();
        $product->quantity = $productRequestDto->getQuantity();
        $product->price = $productRequestDto->getPrice();
        $product->category = $productRequestDto->getCategory();
        $product->sku = $productRequestDto->getSku();

        return $product;
    }
}
