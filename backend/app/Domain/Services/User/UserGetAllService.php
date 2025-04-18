<?php

namespace App\Domain\Services\User;

use App\Application\Builder\PaginatedBuilder;
use App\Assembler\Product\UserToUserResponseDtoAssembler;
use App\Domain\Repositories\Contracts\UserRepositoryInterface;
use App\Support\RoleVisibility;
use Illuminate\Pagination\Paginator;

class UserGetAllService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function __invoke(int $perPage, int $page): array
    {
        $user = auth()->user();
        $idUser = $user->id;
        $visibleRoles = RoleVisibility::visibleRolesFor($user->getRoleNames()->first());

        Paginator::currentPageResolver(fn () => $page);

        $paginated = $this->userRepository->getAllPaginatedExceptLoggedUser($perPage, $visibleRoles, $idUser);
        $users = $paginated->getCollection();

        $arrayUsers = $users->map(fn($user) =>
            (new UserToUserResponseDtoAssembler())($user)->toArray()
        )->all();

        return (new PaginatedBuilder())(
            $paginated->currentPage(),
            $paginated->total(),
            $paginated->lastPage(),
            $arrayUsers
        )->toArray();
    }
}
