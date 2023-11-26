<?php

namespace App\Livewire\Views\Shop\User;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Renderless;
use Illuminate\Support\Facades\Auth;

class Orders extends Component
{
    public $orderItems;

    public function mount()
    {
        $this->orderItems = [];
    }

    public function render()
    {
        return view('livewire.views.shop.user.orders');
    }
}
