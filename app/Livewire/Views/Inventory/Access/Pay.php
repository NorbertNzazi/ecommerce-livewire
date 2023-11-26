<?php

namespace App\Livewire\Views\Inventory\Access;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pay extends Component
{
    public $accountHolder, $cardNumber, $cardCvv, $cardExpiry;

    public function mount()
    {
        //
    }

    public function pay()
    {
        //
        $this->validate([
            'accountHolder' => ['required', 'string'],
            'cardNumber' => ['required', 'numeric', 'digits:16,16'],
            'cardCvv' => ['required', 'numeric', 'digits:3,3'],
            'cardExpiry' => ['required', 'date', 'after_or_equal:today'],
        ]);

        try {
            User::find(Auth::user()->user_id)->update([
                'can_sell' => true
            ]);

            $this->reset('accountHolder', 'cardNumber', 'cardCvv', 'cardExpiry');

            return redirect()->route('inventory')->with('success', 'Payment successful. Welcome to your inventory');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.views.inventory.access.pay');
    }
}
