<?php

namespace App\Application\Http\Controllers\Product;

use App\Domain\Services\Product\ProductGetAllService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductGetAllController extends Controller
{
    public function __construct(
        private ProductGetAllService $productService
    ) {
    }

    public function __invoke(Request $request)
    {
        $perPage = min((int) $request->get('limit', 10), 100);
        $page = $request->get('page', 1);

        return Inertia::render('Products/Index', [
            'products' => ($this->productService)($perPage, $page)
        ]);
    }
}
