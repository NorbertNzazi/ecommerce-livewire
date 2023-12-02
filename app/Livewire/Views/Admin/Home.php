<?php

namespace App\Livewire\Views\Admin;

use App\Models\CartItem;
use App\Models\Categories;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $cards, $orders;

    public function mount()
    {
        $this->cards = [
            ['title' => 'Users', 'routeTo' => 'admin-users', 'count' => count(User::all())],
            ['title' => 'Products', 'routeTo' => 'admin-products', 'count' => count(Product::all())],
            ['title' => 'Orders', 'routeTo' => 'admin-orders', 'count' => count(Order::all())],
            ['title' => 'Categories', 'routeTo' => 'admin-categories', 'count' => count(Categories::all())],
            ['title' => 'Payments', 'routeTo' => 'admin-payments', 'count' => count(Payment::all())],
        ];
    }

    public function render()
    {
        return view('livewire.views.admin.home');
    }
}
