<?php

namespace App\Livewire\Views\Admin;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $items;

    public function mount()
    {
        $this->items = Product::all();
    }
    public function render()
    {
        return view('livewire.views.admin.products');
    }
}
