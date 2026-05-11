<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\API\TableController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\KitchenController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\EntryController;
use App\Http\Controllers\API\WaiterController;

Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'index']); // full menu + filter
        Route::get('/categories', [MenuController::class, 'categories']);
        Route::get('/category/{id}', [MenuController::class, 'categoryItems']);
        Route::get('/search', [MenuController::class, 'search']);
        Route::get('/item/{id}', [MenuController::class, 'itemDetails']);
    });
    Route::get('/tables',[TableController::class,'index']);


    Route::post('/orders/create', [OrderController::class, 'create']);
    Route::post('/orders/update-item', [OrderController::class, 'updateItem']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

    Route::post('/payment',[PaymentController::class,'pay']);

    Route::post('/entry/create', [EntryController::class, 'create']);
    Route::get('/entry/dashboard', [EntryController::class, 'dashboard']);

    Route::get('/waiter/dashboard', [WaiterController::class, 'dashboard']);

    Route::prefix('kitchen')->group(function () {
        // 🔥 MAIN DASHBOARD
        Route::get('/dashboard', [KitchenController::class, 'dashboard']);
        // 📦 Orders only
        Route::get('/orders', [KitchenController::class, 'orders']);
        // 📊 Stats only
        Route::get('/stats', [KitchenController::class, 'stats']);
        // 🔄 Update item status
        Route::post('/item-status', [KitchenController::class, 'updateItemStatus']);

    });

});