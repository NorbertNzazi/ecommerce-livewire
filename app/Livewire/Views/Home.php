<?php

namespace App\Livewire\Views;

use App\Models\CartItem;
use App\Models\Item;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Renderless;

class Home extends Component
{

    public $items;

    public function mount()
    {
        $this->items = Item::all();
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
                'item_id' => $id,
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
        return redirect()->route('item', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.views.home');
    }
}
