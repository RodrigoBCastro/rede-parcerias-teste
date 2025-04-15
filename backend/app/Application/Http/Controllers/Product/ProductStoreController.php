<?php

namespace App\Application\Http\Controllers\Product;

use App\Application\Requests\ProductRequest;
use App\Assembler\Product\ProductRequestToPessoaRequestDtoAssembler;
use App\Domain\Services\Product\ProductCreateService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ProductStoreController extends Controller
{
    public function __construct(
        private ProductCreateService $productService
    ) {
    }

    public function __invoke(ProductRequest $request): RedirectResponse
    {
        $productRequestDto = (new ProductRequestToPessoaRequestDtoAssembler())($request->validated());
        ($this->productService)($productRequestDto);

        return redirect()->route('Products.index')->with('success', 'Product criado com sucesso.');
    }
}
