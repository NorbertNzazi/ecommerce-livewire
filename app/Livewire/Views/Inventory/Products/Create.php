<?php

namespace App\Livewire\Views\Inventory\Products;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $imagePlaceholder, $name, $price, $stock, $description, $image, $categories, $category;

    public function mount()
    {
        $this->imagePlaceholder = asset('img/placeholder.png');
        $this->categories = Categories::all();
    }

    public function saveProduct()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'image' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        try {
            $product = Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'qty' => $this->stock,
                'user_id' => Auth::user()->user_id,
                'description' => $this->description,
                'category_id' => $this->category,
            ]);

            $product->update([
                'image' => $this->image->storeAs('img/product-images', $product->product_id . '.' . $this->image->getClientOriginalExtension(), 'image')
            ]);

            session()->flash('success', 'Product added successfully');

            $this->reset('name', 'price', 'stock', 'description', 'image', 'category');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.views.inventory.products.create');
    }
}
