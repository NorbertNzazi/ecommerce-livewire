<?php

namespace App\Livewire\Views\Shop\Products;

use Livewire\Component;
use App\Models\CartItem;
use App\Models\Item as ModelsItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class One extends Component
{
    public $product, $qty;

    public function mount($id)
    {
        $this->product = Product::find($id);

        if (!$this->product) {
            return back()->with('error', 'Product does not exist');
        }

        $this->qty = 1;
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            return redirect()->route("login");
        }

        try {
            CartItem::create([
                'user_id' => Auth::user()->user_id,
                'product_id' => $this->product->product_id,
                'qty' => $this->qty
            ]);

            $this->dispatch('updatedCart');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.views.shop.products.one');
    }
}
