<?php

namespace App\Livewire\Views\Inventory\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Renderless;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class All extends Component
{
    public $items;

    public function mount()
    {
        $this->items = Product::where('user_id', Auth::user()->user_id)->get();
    }

    public function viewItem($id)
    {
        return redirect()->route('inventory-product', ['id' => Crypt::encrypt($id)]);
    }

    
    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return session()->flash('error', 'Product does not exist');
        }

        Product::destroy($product->product_id);
        $this->items = Product::where('user_id', Auth::user()->user_id)->get();
    }

    public function render()
    {
        return view('livewire.views.inventory.products.all');
    }
}
