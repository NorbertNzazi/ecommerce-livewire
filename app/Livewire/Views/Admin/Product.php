<?php

namespace App\Livewire\Views\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Crypt;
use App\Models\Product as ProductModel;

class Product extends Component
{
    use WithFileUploads;

    public $item, $name, $description, $price, $image, $imagePlaceholder, $stock;

    public function mount($id)
    {
        $this->item = ProductModel::find(Crypt::decrypt($id));

        if (!$this->item) {
            return redirect()->route('admin-products')->with('error', 'Product not found');
        }


        $this->name = $this->item->name;
        $this->price = $this->item->price;
        $this->stock = $this->item->qty;
        $this->description = $this->item->description;

        $this->imagePlaceholder = asset('img/placeholder.png');
    }

    public function saveProduct()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'description' => ['required', 'string'],
        ]);

        try {
            $this->item->update([
                'name' => $this->name,
                'price' => $this->price,
                'qty' => $this->stock,
                'description' => $this->description,
                'image' => $this->image ? $this->image->storeAs('img/product-images', $this->item->product_id . '.' . $this->image->getClientOriginalExtension(), 'image') : $this->item->image
            ]);

            session()->flash('success', 'Product updated successfully');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function deleteProduct()
    {
        try {
            $this->item->delete();

            return redirect()->route('admin-products')->with('success', 'Product deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.views.admin.product');
    }
}
