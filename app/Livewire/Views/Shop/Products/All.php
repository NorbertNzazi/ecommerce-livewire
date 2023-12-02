<?php

namespace App\Livewire\Views\Shop\Products;

use App\Models\CartItem;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Renderless;

class All extends Component
{
    public $items;

    public function mount()
    {
        $this->items = Auth::check() ? Product::where('user_id', '!=', Auth::user()->user_id)->get() : Product::all();
    }

    #[Renderless]
    public function addToCart(int $id)
    {
        //

        if (!Auth::check()) {
            return redirect()->route("auth");
        }

        try {
            CartItem::create([
                'user_id' => Auth::user()->user_id,
                'product_id' => $id,
                'qty' => 1
            ]);

            $this->dispatch('updatedCart');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function viewItem($id)
    {
        return redirect()->route('product', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.views.shop.products.all');
    }
}
