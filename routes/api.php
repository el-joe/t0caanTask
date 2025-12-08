<?php

use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\OrderController;
use App\Http\Controllers\Api\Admin\PaymentMethodController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::post('login', [AuthController::class, 'login'])->middleware('guest:admin');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:admin');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('products',ProductController::class);
        Route::apiResource('payment-methods',PaymentMethodController::class);

        Route::get('orders',[OrderController::class,'index']);
        Route::post('orders/create',[OrderController::class,'store']);
        Route::put('orders/{order}',[OrderController::class,'update']);

        Route::post('orders/{order}/add-item',[OrderController::class,'addItem']);
        Route::post('orders/{order}/update-item/{itemId}',[OrderController::class,'updateItem']);
        Route::delete('orders/{order}/remove-item/{itemId}',[OrderController::class,'removeItem']);
    });
});
