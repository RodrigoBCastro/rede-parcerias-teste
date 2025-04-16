<?php

namespace App\Support;

class RoleVisibility
{
    public static function visibleRolesFor(string $role): array
    {
        return match ($role) {
            'admin' => ['admin', 'operator', 'common'],
            'operator' => ['operator', 'common'],
            'common' => ['common'],
            default => [],
        };
    }
}
