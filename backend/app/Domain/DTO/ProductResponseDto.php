<?php

namespace App\Domain\DTO;

class ProductResponseDto
{
    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private int $quantity,
        private float $price,
        private string $category,
        private string $sku,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getQuantity(): int
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
            'id' => $this->getId(),
            'nome' => $this->getName(),
            'descricao' => $this->getDescription(),
            'quantidade' => $this->getQuantity(),
            'preco' => $this->getPrice(),
            'categoria' => $this->getCategory(),
            'sku' => $this->getSku(),
        ];
    }
}
