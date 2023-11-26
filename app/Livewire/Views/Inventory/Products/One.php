<?php

namespace App\Livewire\Views\Inventory\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class One extends Component
{
    use WithFileUploads;

    public $imagePlaceholder, $name, $price, $stock, $description, $image;

    public $item;

    public function mount($id)
    {
        $this->item = Product::find(Crypt::decrypt($id));

        $this->name = $this->item->name;
        $this->price = $this->item->price;
        $this->stock = $this->item->qty;
        $this->description = $this->item->description;
    }

    public function saveProduct()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'integer'],
            'description' => ['required', 'string'],
        ]);

        try {
            $this->item->update([
                'name' => $this->name,
                'price' => $this->price,
                'qty' => $this->stock,
                'user_id' => Auth::user()->user_id,
                'description' => $this->description,
                'image' => $this->image ? $this->image->storeAs('img/product-images', $this->item->product_id . '.' . $this->image->getClientOriginalExtension(), 'public') : $this->item->image,
            ]);

            session()->flash('success', 'Product updated successfully');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function deleteProduct()
    {
        $destroyed = $this->item->delete();

        if ($destroyed) {
            return redirect()->route('inventory-products')->with('success', 'Product deleted successfully');
        }
    }

    public function render()
    {
        return view('livewire.views.inventory.products.one');
    }
}
