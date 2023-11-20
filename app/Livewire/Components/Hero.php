<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Hero extends Component
{
    protected $listeners = [
        'categorize' => 'categorize'
    ];

    public function categorize($category)
    {
        dd('Categorize' . $category);
    }

    public function setCategory($category)
    {
        dd('Categorize ', $category);
    }

    public function render()
    {
        return view('livewire.components.hero');
    }
}
