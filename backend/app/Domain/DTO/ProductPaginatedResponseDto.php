<?php

namespace App\Domain\DTO;

class ProductPaginatedResponseDto
{
    public function __construct(
        private string $page,
        private string $totalResults,
        private string $totalPages,
        private array $products,
    ) {
    }

    public function getPage(): string
    {
        return $this->page;
    }

    public function getTotalResults(): string
    {
        return $this->totalResults;
    }

    public function getTotalPages(): string
    {
        return $this->totalPages;
    }

    public function getProducts(): array
    {
        return $this->products;
    }


    public function toArray(): array
    {
        return [
            'page' => $this->getPage(),
            'totalResults' => $this->getTotalResults(),
            'totalPages' => $this->getTotalPages(),
            'products' => $this->getProducts(),
        ];
    }
}
