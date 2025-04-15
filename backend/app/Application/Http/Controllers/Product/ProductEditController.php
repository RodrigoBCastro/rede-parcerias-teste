<?php

namespace App\Application\Http\Controllers\Product;

use App\Domain\Models\Product;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProductEditController extends Controller
{
    public function __construct(
    ) {
    }

    public function __invoke(Product $product)
    {
        return Inertia::render('Products/Form', [
            'product' => $product
        ]);
    }
}
