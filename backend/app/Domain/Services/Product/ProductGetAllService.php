<?php

namespace App\Domain\Services\Product;

use App\Application\Builder\PaginatedBuilder;
use App\Assembler\Product\ProductToProductResponseDtoAssembler;
use App\Domain\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Pagination\Paginator;

class ProductGetAllService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    public function __invoke(int $perPage, int $page): array
    {
        Paginator::currentPageResolver(fn () => $page);

        $paginated = $this->productRepository->getAllPaginated($perPage);
        $products = $paginated->getCollection();

        $arrayProducts = $products->map(fn($product) =>
            (new ProductToProductResponseDtoAssembler())($product)->toArray()
        )->all();

        return (new PaginatedBuilder())(
            $paginated->currentPage(),
            $paginated->total(),
            $paginated->lastPage(),
            $arrayProducts
        )->toArray();
    }
}
