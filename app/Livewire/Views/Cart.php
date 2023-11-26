<?php

namespace App\Livewire\Views;

use App\Models\CartItem;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $cartItems, $cartItemsTotal, $user, $newQty;

    public function mount()
    {

        $this->user = Auth::user();

        if (!$this->user) {
            $this->cartItems = [];
            $this->cartItemsTotal = 0;
            return;
        }

        self::initializeCart();
    }

    public function removeFromCart($id)
    {
        try {
            CartItem::destroy($id);

            self::initializeCart();

            $this->dispatch('updatedCart');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    public function updateQty($id)
    {
        try {
            CartItem::where('cart_item_id', $id)->update([
                'qty' => $this->newQty[$id]
            ]);

            self::initializeCart();

            $this->dispatch('updatedCart');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function initializeCart()
    {
        $this->cartItems = $this->user->cartItems;

        foreach ($this->cartItems as $cartItem) {
            $this->newQty[$cartItem->cart_item_id] = $cartItem->qty;
        }

        $this->cartItemsTotal = 0;

        foreach ($this->cartItems as $cartItem) {
            $this->cartItemsTotal += $cartItem->product->price * $cartItem->qty;
        }
    }

    public function render()
    {
        return view('livewire.views.cart');
    }
}
