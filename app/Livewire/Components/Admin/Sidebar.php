<?php

namespace App\Livewire\Components\Admin;

use Livewire\Component;

class Sidebar extends Component
{
    public function goto($route)
    {
        return redirect()->route($route);
    }

    public function render()
    {
        return view('livewire.components.admin.sidebar');
    }
}
