<?php

namespace App\Domain\DTO;

class ProductResponseDto
{
    public function __construct(
        private string $uuid,
        private string $name,
        private string $description,
        private int $quantity,
        private float $price,
        private string $category,
        private string $sku,
        private \DateTime $createdAt,
        private \DateTime $updatedAt,
    ) {
    }

    public function getUuid(): string
    {
        return $this->uuid;
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

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->getUuid(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'quantity' => $this->getQuantity(),
            'price' => $this->getPrice(),
            'category' => $this->getCategory(),
            'sku' => $this->getSku(),
            'createdAt' => $this->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt' => $this->getUpdatedAt()->format('Y-m-d H:i:s'),
        ];
    }
}
