<?php

use App\Application\Http\Actions\Auth\UserCreateAction;
use App\Application\Http\Actions\Auth\UserJoinAction;
use App\Application\Http\Actions\Product\ProductCreateAction;
use App\Application\Http\Actions\Product\ProductDeleteAction;
use App\Application\Http\Actions\Product\ProductGetAllAction;
use App\Application\Http\Actions\Product\ProductGetByIdAction;
use App\Application\Http\Actions\Product\ProductUpdateAction;
use Illuminate\Support\Facades\Route;

Route::post('/login', UserJoinAction::class);
Route::post('/register', UserCreateAction::class);

Route::prefix('products')->group(function () {
    Route::get('/', ProductGetAllAction::class);
    Route::post('/', ProductCreateAction::class);
    Route::get('/{products}', ProductGetByIdAction::class);
    Route::put('/{products}', ProductUpdateAction::class);
    Route::delete('/{products}', ProductDeleteAction::class);
});
