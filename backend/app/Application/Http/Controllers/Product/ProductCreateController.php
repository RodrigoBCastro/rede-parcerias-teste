<?php

namespace App\Application\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProductCreateController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Products/Form');
    }
}
