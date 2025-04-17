<?php

namespace App\Application\Http\Actions\Product\v1;

use App\Domain\Services\Product\ProductGetByIdService;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductGetByIdAction
{
    public function __construct(
        private ProductGetByIdService $productService
    ) {
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Busca um produto pelo ID",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Produto encontrado")
     * )
     */
    public function __invoke(int $idProduct): JsonResponse
    {
        return response()->json(
            ($this->productService)($idProduct)->toArray()
        );
    }
}
