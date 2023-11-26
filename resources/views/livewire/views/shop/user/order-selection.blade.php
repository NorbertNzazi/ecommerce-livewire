<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>My Orders</span>
    </div>
    <ul>
        @unless (count($orders) > 0)
            <li>No orders yet</li>
        @else
            @foreach ($orders as $key => $order)
                <li wire:key="{{ $order->order_id }}" wire:click="selectOrder({{ $order->order_id }})"> #
                    {{ $order->created_at }} <span
                        style="text-align: end;color:green;font-weight:bold;">{{ ' R' . $order->amount }}
                    </span>
                </li>
            @endforeach
        @endunless
    </ul>
</div>
