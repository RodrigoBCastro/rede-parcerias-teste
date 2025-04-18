<?php

namespace App\Application\Http\Actions\Product\v1;

use App\Domain\Services\Product\ProductGetAllService;
use Illuminate\Http\Request;
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
    public function __invoke(Request $request): JsonResponse
    {
        $perPage = min((int) $request->get('limit', 10), 100);
        $page = $request->get('page', 1);

        return response()->json(
            ($this->productService)($perPage, $page)
        );
    }
}
