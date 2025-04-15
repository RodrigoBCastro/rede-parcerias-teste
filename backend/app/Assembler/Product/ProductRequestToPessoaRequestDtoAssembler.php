<?php

namespace App\Assembler\Product;

use App\Domain\DTO\ProductRequestDto;

class ProductRequestToPessoaRequestDtoAssembler
{
    public function __invoke(array $content): ProductRequestDto
    {
        return new ProductRequestDto(
            $content['name'] ?? null,
            $content['description'] ?? null,
            $content['quantity'],
            $content['price'] ?? null,
            $content['category'] ?? null,
            $content['sku'] ?? null,
        );
    }
}
