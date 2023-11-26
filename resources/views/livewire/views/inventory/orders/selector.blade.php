<div class="hero__categories">
    <div class="hero__categories__all" style="background-color: black;">
        <i class="fa fa-bars"></i>
        <span>Customer Orders</span>
    </div>

    <div wire:loading>
        <livewire:components.loader />
    </div>

    <ul>
        @unless (count($orders) > 0)
            <li>No orders yet</li>
        @else
            @foreach ($orders as $orderId => $orderData)
                <li wire:key="{{ $orderId }}" wire:click="selectOrder({{ $orderId }})">
                    #{{ $orderData['order']['created_at'] }}
                    <span style="text-align: end;color:green;font-weight:bold;"> R
                        {{ $orderData['order']['amount'] }}
                    </span>
                </li>
            @endforeach
        @endunless
    </ul>
</div>
