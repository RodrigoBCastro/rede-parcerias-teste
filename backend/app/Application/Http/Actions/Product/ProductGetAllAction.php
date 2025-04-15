<?php

namespace App\Application\Http\Actions\Product;

use App\Domain\Services\Product\ProductGetAllService;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductGetAllAction
{
    public function __construct(
        private ProductGetAllService $productService
    ) {
    }

    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Lista todos os produtos",
     *     @OA\Response(response=200, description="Lista de produtos")
     * )
     */
    public function __invoke(): JsonResponse
    {
        return response()->json(
            ($this->productService)()
        );
    }
}
