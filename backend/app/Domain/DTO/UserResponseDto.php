<?php

namespace App\Domain\DTO;

class UserResponseDto
{
    public function __construct(
        private string $name,
        private string $role,
        private string $email,
    ) {
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
            'name' => $this->getName(),
            'role' => $this->getRole(),
            'email' => $this->getEmail(),
        ];
    }
}
