<?php

namespace App\Application\Controller\Product;

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
     *             @OA\Property(property="nome_produto", type="string", example="Notebook atualizado"),
     *             @OA\Property(property="id_categoria_produto", type="integer", example=1),
     *             @OA\Property(property="valor_produto", type="number", format="float", example=1299.99)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Produto atualizado com sucesso")
     * )
     */
    public function __invoke(ProductRequest $request, int $idProduct): JsonResponse
    {
        $productRequestDto = (new ProductRequestToPessoaRequestDtoAssembler())($request);

        return response()->json(
            ($this->productService)($idProduct, $productRequestDto)->toArray(), 201
        );
    }
}
