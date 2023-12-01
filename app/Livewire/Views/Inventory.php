<?php

namespace App\Livewire\Views;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Inventory extends Component
{
    public $cards, $orders;

    public function mount()
    {
        if (!Auth::user()->can_sell) {
            return redirect()->route('inventory-pay');
        }

        $this->cards = [
            ['title' => 'Products', 'routeTo' => 'inventory-products', 'count' => self::getCount('products')],
            ['title' => 'Orders', 'routeTo' => 'inventory-orders', 'count' => self::getCount('orders')],
        ];
    }

    public function getCount($for)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        switch ($for) {
            case 'products':
                $count = Product::where('user_id', Auth::user()->user_id)->get();
                break;

            case 'orders':
                self::countOrders();
                $count = $this->orders;
                break;

            default:
                $count = 0;
                break;
        }

        return count($count);
    }

    public function countOrders()
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

    public function render()
    {
        return view('livewire.views.inventory');
    }
}
