<?php

namespace App\Domain\DTO;

class AuthResponseDto
{
    public function __construct(
        private string $name,
        private string $role,
        private string $token,
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

    public function getToken(): string
    {
        return $this->token;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'role' => $this->getRole(),
            'token' => $this->getToken()
        ];
    }
}
