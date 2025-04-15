<?php

namespace App\Application\Http\Controllers\Product;

use App\Application\Requests\ProductRequest;
use App\Assembler\Product\ProductRequestToPessoaRequestDtoAssembler;
use App\Domain\Models\Product;
use App\Domain\Services\Product\ProductUpdateService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ProductUpdateController extends Controller
{
    public function __construct(
        private ProductUpdateService $productService
    ) {
    }

    public function __invoke(ProductRequest $request, Product $product): RedirectResponse
    {
        $productRequestDto = (new ProductRequestToPessoaRequestDtoAssembler())($request->validated());
        ($this->productService)($product->id, $productRequestDto);

        return redirect()->route('products.index')->with('success', 'Produto deletado!');
    }
}
