<?php

namespace App\Application\Controller\Product;

use App\Application\Requests\ProductRequest;
use App\Assembler\Product\ProductRequestToPessoaRequestDtoAssembler;
use App\Domain\Services\Product\ProductCreateService;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductCreateAction
{
    public function __construct(
        private ProductCreateService $productService
    ) {
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Cria um novo produto",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nome_produto", type="string", example="Notebook atualizado"),
     *             @OA\Property(property="id_categoria_produto", type="integer", example=1),
     *             @OA\Property(property="valor_produto", type="number", format="float", example=1299.99)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Produto criado com sucesso")
     * )
     */
    public function __invoke(ProductRequest $request): JsonResponse
    {
        $productRequestDto = (new ProductRequestToPessoaRequestDtoAssembler())($request);

        return response()->json(
            ($this->productService)($productRequestDto)->toArray(), 201
        );
    }
}
