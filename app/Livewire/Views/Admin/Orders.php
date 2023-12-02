<?php

namespace App\Livewire\Views\Admin;

use App\Models\Order;
use Livewire\Component;

class Orders extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::all();
    }

    public function render()
    {
        return view('livewire.views.admin.orders');
    }
}
