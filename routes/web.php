<?php

use App\Livewire\Views\Cart;
use App\Livewire\Views\Home;
use App\Livewire\Views\Item;
use App\Livewire\Views\Checkout;
use App\Livewire\Views\Inventory;
use App\Livewire\Views\Auth\Access;
use App\Livewire\Views\Inventory\Access\Pay;
use App\Livewire\Views\InventoryItem;
use Illuminate\Support\Facades\Route;
use App\Livewire\Views\PaymentResponse;

use App\Livewire\Views\Inventory\Products\Create as InventoryProductNew;
use App\Livewire\Views\Inventory\Products\All as InventoryProducts;
use App\Livewire\Views\Inventory\Products\One as InventoryProduct;

use App\Livewire\Views\Inventory\Orders\All as InventoryOrders;
use App\Livewire\Views\Inventory\Orders\One as InventoryOrder;

use App\Livewire\Views\Shop\Products\All as ShopProducts;
use App\Livewire\Views\Shop\Products\One as ShopProduct;
use App\Livewire\Views\Shop\User\Order;
use App\Livewire\Views\Shop\User\Orders;

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

Route::get('/', ShopProducts::class)->name('home');

Route::middleware(['auth'])->group(function () {
    // Routes that require the user to be authenticated
    Route::get('/cart', Cart::class)->name('cart');
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/inventory', Inventory::class)->name('inventory');
    Route::get('/inventory/orders', InventoryOrders::class)->name('inventory-orders');
    Route::get('/inventory/order/{id}/{products}', InventoryOrder::class)->name('inventory-order');
    Route::get('/payment-{status}', PaymentResponse::class)->name('payment-response');
    Route::get('/orders', Orders::class)->name('user-orders');
    Route::get('/orders/{id}', Order::class)->name('user-order');
    Route::get('/inventory/products/new', InventoryProductNew::class)->name('inventory-product-new');
    Route::get('/inventory/products/{id}', InventoryProduct::class)->name('inventory-product');
    Route::get('/inventory/products', InventoryProducts::class)->name('inventory-products');
    Route::get('/inventory/pay', Pay::class)->name('inventory-pay');
});

Route::middleware(['guest'])->group(function () {
    // Routes that should be accessible only to guests
    Route::get('/auth', Access::class)->name('login');
});

Route::get('/product/{id}', ShopProduct::class)->name('product');
