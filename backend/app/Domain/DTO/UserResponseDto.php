<?php

namespace App\Domain\DTO;

class UserResponseDto
{
    public function __construct(
        private int $id,
        private string $name,
        private string $role,
        private string $email,
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

    public function getRole(): string
    {
        return $this->role;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'role' => $this->getRole(),
            'email' => $this->getEmail(),
        ];
    }
}
