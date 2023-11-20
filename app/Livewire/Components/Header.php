<?php

namespace App\Livewire\Components;

use App\Models\Item;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public $cartItems, $cartItemsTotal, $user;


    public function mount()
    {
        //
        $this->user = Auth::user();

        if (!$this->user) {
            $this->cartItems = [];
            $this->cartItemsTotal = 0;
            return;
        }

        $this->cartItems = $this->user->cartItems;
        self::getCartItemsTotal();
    }

    #[On('updatedCart')]
    public function updatedCart()
    {
        $this->cartItems = $this->user->cartItems;
        self::getCartItemsTotal();
    }

    public function getCartItemsTotal()
    {
        $this->cartItemsTotal = 0;

        foreach ($this->cartItems as $cartItem) {
            $this->cartItemsTotal += $cartItem->item->price * $cartItem->qty;
        }
    }

    public function render()
    {
        return view('livewire.components.header');
    }
}
