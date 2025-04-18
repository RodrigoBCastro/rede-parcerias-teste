<?php

namespace App\Application\Builder;

use App\Domain\DTO\PaginatedItemsResponseDto;

class PaginatedBuilder
{
    public function __invoke(string $page, string $totalResults, string $totalPages, array $items): PaginatedItemsResponseDto
    {
        return new PaginatedItemsResponseDto(
            page: $page,
            totalResults: $totalResults,
            totalPages: $totalPages,
            items: $items,
        );
    }
}
