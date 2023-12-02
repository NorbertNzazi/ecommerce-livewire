<?php

namespace App\Livewire\Views\Admin;

use App\Models\Categories as ModelsCategories;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = ModelsCategories::all();
    }
    public function render()
    {
        return view('livewire.views.admin.categories');
    }
}
