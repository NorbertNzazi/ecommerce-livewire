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
                                    <h6><span>{{ count($payments) }}</span> Payment(s) found</h6>
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
                        @unless (count($payments) > 0)
                            <h3>No payments found</h3>
                        @else
                            @foreach ($payments as $payment)
                                <div wire:key="{{ $payment->payment_id }}"
                                    class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center">
                                    <div class="product__item d-flex flex-column justify-content-center"
                                        style="text-align:center;">

                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/money.png') }}"
                                            style="width: 150px; height: 150px;object-fit:cover;">
                                        </div>

                                        <span style="color:green;">
                                            {{ $payment->description }}
                                        </span>

                                        <span style="color:red;">
                                            {{ $payment->transaction_id }}
                                        </span>

                                        <div class="product__item__text">
                                            <h6>
                                                <a>{{ $payment->name }}</a>
                                            </h6>

                                            <h5>R{{ $payment->amount }}</h5>
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
