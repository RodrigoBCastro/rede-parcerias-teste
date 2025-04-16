<?php

use App\Application\Http\Actions\Auth\v1\UserCreateAction;
use App\Application\Http\Actions\Auth\v1\UserJoinAction;
use App\Application\Http\Actions\Product\v1\ProductCreateAction;
use App\Application\Http\Actions\Product\v1\ProductDeleteAction;
use App\Application\Http\Actions\Product\v1\ProductGetAllAction;
use App\Application\Http\Actions\Product\v1\ProductGetByIdAction;
use App\Application\Http\Actions\Product\v1\ProductUpdateAction;
use App\Application\Http\Actions\User\UserGetAllAction;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/login', UserJoinAction::class);
    Route::post('/register', UserCreateAction::class);

    Route::middleware('auth:api')->prefix('products')->group(function () {
        Route::get('/', ProductGetAllAction::class)->middleware('role:admin|operator|common');
        Route::get('/{product}', ProductGetByIdAction::class)->middleware('role:admin|operator|common');

        Route::put('/{product}', ProductUpdateAction::class)->middleware('role:admin|operator');

        Route::post('/', ProductCreateAction::class)->middleware('role:admin');
        Route::delete('/{product}', ProductDeleteAction::class)->middleware('role:admin');
    });

    Route::middleware('auth:api')->prefix('users')->group(function () {
        Route::get('/', UserGetAllAction::class)->middleware('role:admin|operator|common');
    });
});
