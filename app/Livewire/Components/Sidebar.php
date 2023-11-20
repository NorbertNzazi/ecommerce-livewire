<?php

namespace App\Livewire\Components;

use App\Models\Categories;
use Livewire\Component;

class Sidebar extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Categories::all();
    }

    public function render()
    {
        return view('livewire.components.sidebar');
    }
}
