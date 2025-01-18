<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BookingForm;
use App\Livewire\OrdersPage;
use Laravel\Fortify\Fortify;

// Livwire
Route::get('/', \App\Livewire\HomePage::class)->name('home');
Route::get('/menu', \App\Livewire\StoreFront::class)->name('menu');
Route::get('/product/{productId}', \App\Livewire\Product::class)->name('product');
Route::get('/cart', \App\Livewire\Cart::class)->name('cart');
=======
//Route::get('/bookings', \App\Livewire\Booking::class)->name('bookings');
>>>>>>> e48eb2f28b1241ccf311f67bf4e73a68aba46e77
Route::get('/about', \App\Livewire\AboutPage::class)->name('about');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/bookings', 'bookings')->name('booking');
    Route::view('/profile', 'profile.show')->name('profile');
    Route::get('/orders', OrdersPage::class)->name('orders');
});

//Auth
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
    return view('profile.show');
})->name('profile.show');

//Admin
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class, 'index')->group(function () {
        Route::get('/admin', 'dashboard')->name('dashboard');
        Route::get('/admin/filler', 'index')->name('filler');
    });
});
