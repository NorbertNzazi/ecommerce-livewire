<?php

namespace App\Livewire\Views\Inventory\Access;

use App\Mail\ReceiptMail;
use App\Models\User;
use App\Models\Payment;
use Livewire\Component;
use Dompdf\Dompdf as PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Pay extends Component
{
    public $accountHolder, $cardNumber, $cardCvv, $cardExpiry, $amount;

    public function mount()
    {
        //
        $this->amount = 1500;
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
            $payment = Payment::create([
                'user_id' => Auth::user()->user_id,
                'transaction_id' => Str::random(20),
                'description' => 'Inventory access',
                'amount' => $this->amount,
            ]);

            if ($payment) {

                User::find(Auth::user()->user_id)->update([
                    'can_sell' => true
                ]);

                $paymentData = [
                    'name' => Auth::user()->name . ' ' . Auth::user()->surname,
                    'transaction_id' => $payment->transaction_id,
                    'description' => 'Vendor Inventory Access',
                    'date' => now(),
                    'amount' => $payment->amount,
                ];

                Mail::to(Auth::user()->email)->send(new ReceiptMail($paymentData));

                $this->reset('accountHolder', 'cardNumber', 'cardCvv', 'cardExpiry');

                return redirect()->route('inventory')->with('success', 'Payment successful. Welcome to your inventory');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.views.inventory.access.pay');
    }
}
