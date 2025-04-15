<?php

namespace App\Application\Http\Controllers\Auth;

use App\Application\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class UserJoinController extends Controller
{
    public function __invoke(ProductRequest $request)
    {
        return Inertia::render('Products/Create');
    }
}
