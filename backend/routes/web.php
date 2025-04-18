<?php

use App\Application\Http\Controllers\Auth\UserCreateController;
use App\Application\Http\Controllers\Auth\UserExitController;
use App\Application\Http\Controllers\Auth\UserJoinController;
use App\Application\Http\Controllers\Auth\UserLoginController;
use App\Application\Http\Controllers\Auth\UserRegisterController;
use App\Application\Http\Controllers\Product\ProductCreateController;
use App\Application\Http\Controllers\Product\ProductDeleteController;
use App\Application\Http\Controllers\Product\ProductEditController;
use App\Application\Http\Controllers\Product\ProductGetAllController;
use App\Application\Http\Controllers\Product\ProductStoreController;
use App\Application\Http\Controllers\Product\ProductUpdateController;
use App\Application\Http\Controllers\User\UserGetAllController;
use App\Application\Http\Controllers\User\UserUpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/login', UserLoginController::class)->name('login');
Route::post('/login', UserJoinController::class)->name('auth');

Route::get('/register', UserRegisterController::class)->name('register');
Route::post('/register', UserCreateController::class)->name('create');

Route::post('/logout', UserExitController::class)->name('logout');

Route::middleware(['auth.jwt.web'])->group(function () {
    Route::get('/products', ProductGetAllController::class)->name('products.index');
    Route::get('/products/create', ProductCreateController::class)->name('products.create');
    Route::post('/products', ProductStoreController::class)->name('products.store');
    Route::delete('/products/{product}', ProductDeleteController::class)->name('products.delete');
    Route::get('/products/{product}/edit', ProductEditController::class)->name('products.edit');
    Route::put('/products/{product}', ProductUpdateController::class)->name('products.update');
    Route::get('/users', UserGetAllController::class)->name('users.index');
    Route::get('/users', UserGetAllController::class)->middleware('role:admin|operator')->name('users.index');
    Route::put('/users/{user}/role', UserUpdateController::class)->name('users.update');
});
