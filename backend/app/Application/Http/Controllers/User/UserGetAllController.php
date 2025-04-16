<?php

namespace App\Application\Http\Controllers\User;

use App\Domain\Services\User\UserGetAllService;
use Inertia\Inertia;

class UserGetAllController
{
    public function __construct(
        private UserGetAllService $usuarioService
    ) {
    }

    public function __invoke()
    {
        return Inertia::render('Users/Index', [
            'users' => ($this->usuarioService)(),
        ]);
    }
}
