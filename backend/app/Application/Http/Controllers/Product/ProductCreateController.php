<?php

namespace App\Application\Http\Controllers\Product;

use App\Application\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProductCreateController extends Controller
{
    public function __invoke(ProductRequest $request)
    {
        return Inertia::render('Products/Create');
    }
}
