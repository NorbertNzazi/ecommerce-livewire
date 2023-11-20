<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Cart extends Component
{

    protected $listeners = ["addToCart"];

    public function addToCart($id)
    {
        //
        $this->dispatch('added')->to('views.home');
    }

    public function render()
    {
        return view('livewire.components.cart');
    }
}
