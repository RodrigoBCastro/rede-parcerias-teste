<?php

namespace App\Application\Http\Actions\Product;

use App\Application\Requests\ProductRequest;
use App\Assembler\Product\ProductRequestToPessoaRequestDtoAssembler;
use App\Domain\Services\Product\ProductUpdateService;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductUpdateAction
{
    public function __construct(
        private ProductUpdateService $productService
    ) {
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Atualiza um produto",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     * *             @OA\Property(property="name", type="string", example="Notebook Atualizado"),
     * *             @OA\Property(property="description", type="string", example="Notebook 16GB de RAM"),
     * *             @OA\Property(property="quantity", type="number", format="integer", example=300)
     * *             @OA\Property(property="price", type="number", format="float", example=1279.99)
     * *             @OA\Property(property="category", type="string", example="Computadores e Acessorios")
     * *             @OA\Property(property="sku", type="string", example="ABCDE123456")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Produto atualizado com sucesso")
     * )
     */
    public function __invoke(ProductRequest $request, int $idProduct): JsonResponse
    {
        $productRequestDto = (new ProductRequestToPessoaRequestDtoAssembler())($request->validated());

        return response()->json(
            ($this->productService)($idProduct, $productRequestDto)->toArray(), 201
        );
    }
}
