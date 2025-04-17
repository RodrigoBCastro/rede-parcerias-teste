<?php

namespace App\Application\Builder;

use App\Domain\DTO\ProductPaginatedResponseDto;

class ProductPaginatedBuilder
{
    public function __invoke(string $page, string $totalResults, string $totalPages, array $products): ProductPaginatedResponseDto
    {
        return new ProductPaginatedResponseDto(
            page: $page,
            totalResults: $totalResults,
            totalPages: $totalPages,
            products: $products,
        );
    }
}
