<?php

use App\Http\Controllers\CourierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return 'test';
});

Route::get('/couriers', [CourierController::class, 'index']);
Route::post('/couriers', [CourierController::class, 'store']);
Route::get('/couriers/{id}', [CourierController::class, 'show']);
Route::delete('/couriers/{id}', [CourierController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
// * This is callback url for payment gateway
Route::post('/payment/notification', [TransactionController::class, 'notificationHandler']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
