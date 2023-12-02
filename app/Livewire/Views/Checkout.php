<?php

namespace App\Livewire\Views;

use App\Models\CartItem;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $cartItems, $cartItemsTotal, $user, $newQty;

    //shipment variables
    public $streetAddress, $townCity, $additionalDetails, $postalCode, $shipment, $orderNotes;

    //payment variables
    public $accountHolder, $cardNumber, $cardCvv, $cardExpiry;


    public function mount()
    {

        $this->user = Auth::user();

        if (!$this->user) {
            $this->cartItems = [];
            $this->cartItemsTotal = 0;
            return;
        }

        $this->shipment = false;

        self::initializeCart();
    }


    public function initializeCart()
    {
        $this->cartItems = $this->user->cartItems;

        foreach ($this->cartItems as $cartItem) {
            $this->newQty[$cartItem->cart_item_id] = $cartItem->qty;
        }

        $this->cartItemsTotal = 0;

        foreach ($this->cartItems as $cartItem) {
            $this->cartItemsTotal += $cartItem->product->price * $cartItem->qty;
        }
    }

    public function checkout()
    {
        $this->validate([
            'accountHolder' => ['required', 'string'],
            'cardNumber' => ['required', 'numeric', 'digits:16,16'],
            'cardCvv' => ['required', 'numeric', 'digits:3,3'],
            'cardExpiry' => ['required', 'date', 'after_or_equal:today'],

            //if shipping
            'streetAddress' => ['required_if:shipment,true'],
            'postalCode' => ['bail', 'required_if:shipment,true', 'nullable', 'numeric'],
            'townCity' => ['required_if:shipment,true'],
        ]);

        try {
            $payment = Payment::create([
                'user_id' => Auth::user()->user_id,
                'transaction_id' => Str::random(20),
                'description' => 'Order checkout'
            ]);

            if ($payment) {
                
                $order = Order::create([
                    'shipping' => $this->shipment,
                    'amount' => $this->cartItemsTotal,
                    'status' => 'paid',
                    'payment_id' => $payment->payment_id,
                    'user_id' => Auth::user()->user_id
                ]);

                foreach ($this->cartItems as $cartItem) {
                    $orderItem = OrderItem::create([
                        'order_id' => $order->order_id,
                        'product_id' => $cartItem->product->product_id,
                        'qty' => $cartItem->qty,
                        'amount' => $cartItem->qty * $cartItem->product->price
                    ]);

                    if ($orderItem) {
                        CartItem::destroy($cartItem->cart_item_id);
                    }
                }

                self::initializeCart();
                $this->dispatch('updatedCart');
            }

            return redirect()->route('payment-response', ['status' => 'success']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function render()
    {
        return view('livewire.views.checkout');
    }
}
