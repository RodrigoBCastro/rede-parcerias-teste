<?php

namespace App\Application\Http\Controllers\User;

use App\Domain\Services\User\UserGetAllService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserGetAllController
{
    public function __construct(
        private UserGetAllService $usuarioService
    ) {
    }

    public function __invoke(Request $request)
    {
        $perPage = min((int) $request->get('limit', 10), 100);
        $page = $request->get('page', 1);

        return Inertia::render('Users/Index', [
            'users' => ($this->usuarioService)($perPage, $page)
        ]);
    }
}
