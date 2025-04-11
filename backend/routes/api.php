<?php

use App\Application\Controller\Product\ProductDeleteAction;
use App\Application\Controller\Product\ProductGetAllAction;
use App\Application\Controller\Product\ProductCreateAction;
use App\Application\Controller\Product\ProductGetByIdAction;
use App\Application\Controller\Product\ProductUpdateAction;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(function () {
    Route::get('/', ProductGetAllAction::class);
    Route::post('/', ProductCreateAction::class);
    Route::get('/{products}', ProductGetByIdAction::class);
    Route::put('/{products}', ProductUpdateAction::class);
    Route::delete('/{products}', ProductDeleteAction::class);
});
