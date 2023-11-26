<?php

namespace App\Livewire\Views\Inventory\Orders;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class Selector extends Component
{
    public $orders, $orderItems, $myProducts;

    public function mount()
    {
        $this->orders = [];

        $userProducts = Product::where('user_id', Auth::user()->user_id)->pluck('product_id')->toArray();
        $orders = Order::with('orderItems')->get();

        foreach ($orders as $order) {
            $orderData = [
                'order_id' => $order->order_id,
                'created_at' => $order->created_at,
                'amount' => $order->amount,
            ];

            $productData = [];

            foreach ($order->orderItems as $orderItem) {
                if (in_array($orderItem->product_id, $userProducts)) {
                    $product = Product::find($orderItem->product_id);

                    $productData[] = [
                        'product_id' => $orderItem->product_id,
                        'product_name' => $product->name,
                        'qty' => $orderItem->qty,
                        'amount' => $orderItem->amount,
                        'image' => $orderItem->product->image
                    ];
                }
            }

            $this->orders[$order->order_id] = [
                'order' => $orderData,
                'products' => $productData,
            ];
        }
    }

    public function selectOrder($id)
    {
        return redirect()->route('inventory-order', [
            'id' => Crypt::encrypt($id),
            'products' => Crypt::encrypt($this->orders[$id]['products'])
        ]);
    }

    public function render()
    {
        return view('livewire.views.inventory.orders.selector');
    }
}
