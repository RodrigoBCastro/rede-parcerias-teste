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
     *             @OA\Property(property="name", type="string", example="Notebook"),
     *             @OA\Property(property="description", type="string", example="Notebook 8GB de RAM"),
     *             @OA\Property(property="quantity", type="number", format="integer", example=100)
     *             @OA\Property(property="price", type="number", format="float", example=1299.99)
     *             @OA\Property(property="category", type="string", example="Computadores e Acessorios")
     *             @OA\Property(property="sku", type="string", example="ABCDE123456")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Produto criado com sucesso")
     * )
     */
    public function __invoke(ProductRequest $request): JsonResponse
    {
        $productRequestDto = (new ProductRequestToPessoaRequestDtoAssembler())($request->validated());

        return response()->json(
            ($this->productService)($productRequestDto)->toArray(), 201
        );
    }
}
