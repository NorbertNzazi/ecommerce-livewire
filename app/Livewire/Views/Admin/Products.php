<?php

namespace App\Livewire\Views\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Products extends Component
{
    public $items, $search;

    public function mount()
    {
        $this->items = Product::all();
    }

    public function viewItem($id)
    {
        return redirect()->route('admin-product', ['id' => Crypt::encrypt($id)]);
    }

    public function render()
    {
        return view('livewire.views.admin.products');
    }
}
