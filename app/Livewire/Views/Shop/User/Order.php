<?php

namespace App\Livewire\Views\Shop\User;

use App\Models\Order as OrdersModel;
use Livewire\Component;

class Order extends Component
{
    public $orderId, $search, $orderItems;

    public function mount($id)
    {
        $this->orderItems = OrdersModel::find(intval($id))->orderItems;
    }
    public function render()
    {
        return view('livewire.views.shop.user.order');
    }
}
