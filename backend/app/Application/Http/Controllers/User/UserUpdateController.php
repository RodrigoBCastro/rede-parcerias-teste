<?php

namespace App\Application\Http\Controllers\User;

use App\Application\Requests\ChangeUserRequest;
use App\Domain\Services\User\UserUpdateService;
use App\Models\User;

class UserUpdateController
{
    public function __construct(
        private UserUpdateService $usuarioService
    ) {
    }

    public function __invoke(ChangeUserRequest $request, User $user)
    {
        ($this->usuarioService)($request->user(), $user, $request->validated()['role']);
        return redirect()->back()->with('success', 'Role atualizada com sucesso.');
    }
}
