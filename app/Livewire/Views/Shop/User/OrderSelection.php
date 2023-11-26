<?php

namespace App\Livewire\Views\Shop\User;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class OrderSelection extends Component
{
    public $orders, $orderItems;

    public function mount()
    {
        $this->orders = Order::where('user_id', Auth::user()->user_id)->get();
    }

    public function selectOrder($id)
    {
        return redirect()->route('user-order', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.views.shop.user.order-selection');
    }
}
