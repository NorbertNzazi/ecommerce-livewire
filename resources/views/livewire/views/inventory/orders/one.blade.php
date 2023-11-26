<div>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <livewire:views.inventory.orders.selector />
                </div>

                <div class="col-lg-8">
                    <h3 style="text-align:center;" class="mb-5">Order Products</h3>

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
                                    <h6><span>{{ count($orderItems) }}</span> Product(s) found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span style="font-size:15px;">Status:</span>
                                    <span style="color: green;font-size:15px;font-weight: bold;">Paid</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        @unless (count($orderItems) > 0)
                            <h3>Select an order to view products</h3>
                        @else
                            @foreach ($orderItems as $orderItem)
                                <div wire:key="{{ $orderItem['product_id'] }}" class="col-lg-3 col-md-6 col-sm-6"
                                    wire:click="viewItem({{ $orderItem['product_id'] }})" style="cursor: pointer;">
                                    <div class="product__item">

                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('storage/' . $orderItem['image']) }}">
                                        </div>

                                        <div class="product__item__text">
                                            <h6>
                                                <a>{{ $orderItem['product_name'] }}</a>
                                            </h6>

                                            <p>R{{ $orderItem['amount'] }}
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
