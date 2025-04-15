<?php

use App\Application\Http\Controllers\Product\ProductCreateController;
use App\Application\Http\Controllers\Product\ProductDeleteController;
use App\Application\Http\Controllers\Product\ProductGetAllController;
use App\Application\Http\Controllers\Product\ProductStoreController;
use App\Application\Http\Controllers\Product\ProductUpdateController;
use Illuminate\Support\Facades\Route;



Route::get('/produtos', ProductGetAllController::class)->name('products.index');
Route::get('/produtos', ProductGetAllController::class)->name('products.index');


//Route::middleware(['auth'])->group(function () {
    Route::get('/produtos', ProductGetAllController::class)->name('products.index');
    Route::post('/produtos/create', ProductCreateController::class)->name('products.create');
    Route::post('/produtos', ProductStoreController::class)->name('products.store');
    Route::delete('/produtos', ProductDeleteController::class)->name('products.delete');
    Route::put('/produtos/{product}', ProductUpdateController::class)->name('products.update');



//});
