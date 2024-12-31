<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/products', function () {
    return view('products');
});
Route::get('/categories', function () {
    return view('categories');
});
Route::get('./dashboard', function () {
    return view('dashboard');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/category/electronics', function () {
    return view('category/electronics');
});
Route::get('/category/fashion', function () {
    return view('/category/fashion');
});
Route::get('/category/home', function () {
    return view('/category/home');
});
Route::get('/category/sports', function () {
    return view('/category/sports');
});
Route::get('/category/beauty', function () {
    return view('/category/beauty');
});
Route::get('/category/books', function () {
    return view('/category/books');
});
Route::get('/cartdetails', function () {
    return view('cartdetails');
});
Route::get('/buy-now', function () {
    return view('buy-now');
});

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/payment', [PaymentController::class, 'process'])->name('payment.process');



Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
