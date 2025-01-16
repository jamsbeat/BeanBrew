<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

// Livwire
Route::get('/', \App\Livewire\HomePage::class)->name('home');
Route::get('/menu', \App\Livewire\StoreFront::class)->name('menu');
Route::get('/product/{productId}', \App\Livewire\Product::class)->name('product');
Route::get('/cart', \App\Livewire\Cart::class)->name('cart');
Route::get('/bookings', \App\Livewire\Booking::class)->name('bookings');
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::get('/about', \App\Livewire\AboutPage::class)->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings', function () {
    return view('profile.show');
})->name('profile.show');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth'])->name('admin.dashboard');

