<?php

namespace App\Domain\DTO;

class PaginatedItemsResponseDto
{
    public function __construct(
        private string $page,
        private string $totalResults,
        private string $totalPages,
        private array $items,
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

    public function getItems(): array
    {
        return $this->items;
    }


    public function toArray(): array
    {
        return [
            'page' => $this->getPage(),
            'totalResults' => $this->getTotalResults(),
            'totalPages' => $this->getTotalPages(),
            'items' => $this->getItems(),
        ];
    }
}
