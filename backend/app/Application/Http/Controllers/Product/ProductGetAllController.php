<?php

namespace App\Application\Http\Controllers\Product;

use App\Domain\Services\Product\ProductGetAllService;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProductGetAllController extends Controller
{
    public function __construct(
        private ProductGetAllService $productService
    ) {
    }

    public function __invoke()
    {
        return Inertia::render('Products/Index', [
            'products' => ($this->productService)()
        ]);
    }
}
