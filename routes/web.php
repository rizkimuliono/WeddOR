<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/allproduct', [ProductController::class, 'allproduct'])->name('allproduct');
Route::get('/product/detail/{id}', [HomeController::class, 'product_detail'])->name('product_detail');
Route::get('/vendors', [HomeController::class, 'allVendors'])->name('all_vendors');
Route::get('/vendor/{id}', [HomeController::class, 'vendorDetail'])->name('vendor.detail');
Route::get('/search', [HomeController::class, 'search'])->name('search');


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'addProduct'])->name('cart.add');
    Route::patch('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// JS API
Route::get('/cities/{provinceId}', [HomeController::class, 'getCities']);
Route::get('/districts/{cityId}', [HomeController::class, 'getDistricts']);
