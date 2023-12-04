<?php

namespace App\Livewire\Views\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Orders extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::all();
    }

    public function viewOrder($id)
    {
        return redirect()->route('admin-order', ['id' => Crypt::encrypt($id)]);
    }

    public function render()
    {
        return view('livewire.views.admin.orders');
    }
}
