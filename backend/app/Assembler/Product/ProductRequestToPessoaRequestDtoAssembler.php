<?php

namespace App\Assembler\Product;

use App\Domain\DTO\ProductRequestDto;
use Symfony\Component\HttpFoundation\Request;

class ProductRequestToPessoaRequestDtoAssembler
{
    public function __invoke(Request $request): ProductRequestDto
    {
        $content = json_decode($request->getContent(), true);
        return new ProductRequestDto(
            $content['name'],
            $content['description'],
            $content['quantity'],
            $content['price'],
            $content['category'],
            $content['sku'],
        );
    }
}
