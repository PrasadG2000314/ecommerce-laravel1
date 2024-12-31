<?php

use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Products
    Route::get('/products', [AdminController::class, 'products']);
    Route::post('/products', [AdminController::class, 'storeProduct']);
    Route::put('/products/{product}', [AdminController::class, 'updateProduct']);
    Route::delete('/products/{product}', [AdminController::class, 'deleteProduct']);

    // Orders
    Route::get('/orders', [AdminController::class, 'orders']);
    Route::put('/orders/{order}/status', [AdminController::class, 'updateOrderStatus']);

    // Customers
    Route::get('/customers', [AdminController::class, 'customers']);

    // Analytics
    Route::get('/analytics', [AdminController::class, 'analytics']);
});
