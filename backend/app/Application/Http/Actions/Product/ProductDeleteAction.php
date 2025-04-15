<?php

namespace App\Application\Http\Actions\Product;

use App\Domain\Services\Product\ProductDeleteService;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductDeleteAction
{
    public function __construct(
        private ProductDeleteService $productService
    ) {
    }

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Exclui um produto",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Produto excluído com sucesso")
     * )
     */
    public function __invoke(int $id): JsonResponse
    {
        ($this->productService)($id);
        return response()->json(null, 204);

    }
}
