<?php

use App\Livewire\Views\Auth\Access;
use App\Livewire\Views\Cart;
use App\Livewire\Views\Checkout;
use App\Livewire\Views\Home;
use App\Livewire\Views\Item;
use App\Livewire\Views\PaymentResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Home::class)->name('home');

Route::get('/auth', Access::class)->name('auth');

Route::get('/item/{id}', Item::class)->name('item');

Route::get('/cart', Cart::class)->name('cart');

Route::get('/checkout', Checkout::class)->name('checkout');

Route::get('/payment-{status}', PaymentResponse::class)->name('payment-response');
