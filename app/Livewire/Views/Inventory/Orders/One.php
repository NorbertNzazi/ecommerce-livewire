<?php

namespace App\Livewire\Views\Inventory\Orders;

use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class One extends Component
{
    public $orderItems;

    public function mount($id, $products)
    {
        $this->orderItems = Crypt::decrypt($products);
    }

    public function viewItem($id)
    {
        return redirect()->route('inventory-product', ['id' => Crypt::encrypt($id)]);
    }

    public function render()
    {
        return view('livewire.views.inventory.orders.one');
    }
}
