<?php

namespace App\Application\Http\Controllers\Product;

use App\Domain\Models\Product;
use App\Domain\Services\Product\ProductDeleteService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ProductDeleteController extends Controller
{
    public function __construct(
        private ProductDeleteService $productService
    ) {
    }

    public function __invoke(Product $product): RedirectResponse
    {
        ($this->productService)($product->uuid);

        return redirect()->route('products.index')->with('success', 'Produto deletado!');
    }
}
