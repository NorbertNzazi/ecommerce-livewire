<?php

namespace App\Livewire\Views\Admin;

use App\Models\Payment;
use Livewire\Component;

class Payments extends Component
{
    public $payments;

    public function mount()
    {
        $this->payments = Payment::all();
    }

    public function render()
    {
        return view('livewire.views.admin.payments');
    }
}
