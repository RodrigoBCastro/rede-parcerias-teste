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

Route::middleware('auth:api')->prefix('products')->group(function () {
    Route::get('/', ProductGetAllAction::class)->middleware('role:admin|operator|common');
    Route::get('/{product}', ProductGetByIdAction::class)->middleware('role:admin|operator|common');

    Route::put('/{product}', ProductUpdateAction::class)->middleware('role:admin|operator');

    Route::post('/', ProductCreateAction::class)->middleware('role:admin');
    Route::delete('/{product}', ProductDeleteAction::class)->middleware('role:admin');
});
