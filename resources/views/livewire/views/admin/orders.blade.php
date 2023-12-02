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

                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                {{-- <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="name-asc">Name-Asc</option>
                                        <option value="name-desc">Name-Desc</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ count($orders) }}</span> Order(s) found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                {{-- <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @unless (count($orders) > 0)
                            <h3>No orders found</h3>
                        @else
                            @foreach ($orders as $order)
                                <div wire:key="{{ $order->product_id }}" class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item" wire:click="viewItem({{ $order->product_id }})"
                                        style="cursor: pointer;">

                                        <div wire:loading wire:target="viewItem({{ $order->product_id }})">
                                            <livewire:components.loader />
                                        </div>

                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/trolley.jpg') }}">
                                        </div>

                                        <span style="color:{{ $order->qty == 0 ? 'red' : 'green' }};font-weight:bold;">
                                            {{ $order->qty == 0 ? 'Out of stock' : 'In stock' }}
                                        </span>

                                        <div class="product__item__text">
                                            <h6>
                                                <a>{{ $order->name }}</a>
                                            </h6>

                                            <h5>R{{ $order->price }}</h5>
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
