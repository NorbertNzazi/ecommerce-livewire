<div>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <livewire:components.admin.sidebar />
                </div>


                <div class="col-lg-9">

                    @if (Session::has('success'))
                        @include('components.alert', [
                            'message' => Session::get('success'),
                            'type' => 'success',
                        ])
                    @endif
                    <div class="row">
                        <div class="col-12">
                            Date: {{ $order->created_at }} ----- Amount: {{ $order->amount }} -----
                            Customer:
                            {{ substr($order->user->name, 0, 1) . ' ' . $order->user->surname }}

                            <button class="site-btn" style="background-color: green;font-weight:500;"
                                wire:click="exportOrder()">
                                Export (.pdf)
                            </button>

                        </div>
                    </div>

                    <h3 class="mt-5 mb-2" style="text-align: center;">Order products</h3>

                    <div class="row">

                        @unless (count($order->orderItems) > 0)
                            <h3>Order has no products</h3>
                        @else
                            @foreach ($order->orderItems as $orderItem)
                                <div wire:key="{{ $orderItem->product->product_id }}" class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item">

                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset($orderItem->product->image) }}">
                                        </div>

                                        <div class="product__item__text">
                                            <h6>
                                                <a>{{ $orderItem->product->name }}</a>
                                            </h6>

                                            <p>R{{ $orderItem->amount }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</div>
