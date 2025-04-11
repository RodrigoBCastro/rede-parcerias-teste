<?php

namespace App\Domain\DTO;

class ProductRequestDto
{
    public function __construct(
        private string $name,
        private string $description,
        private float $quantity,
        private float $price,
        private string $category,
        private string $sku,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function toArray(): array
    {
        return [
            'nome' => $this->getName(),
            'descricao' => $this->getDescription(),
            'quantidade' => $this->getQuantity(),
            'preco' => $this->getPrice(),
            'categoria' => $this->getCategory(),
            'sku' => $this->getSku(),
        ];
    }
}
