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

                    <div class="hero__search d-flex align-items-center;">
                        <div class="hero__search__form" style="width:100%;">
                            <form>
                                <input style="width:100%;" type="text" placeholder="Search for a product"
                                    wire:model.live="search">
                            </form>
                        </div>

                        <a href="{{ route('admin-new-user') }}" class="d-flex align-items-center justify-content-center"
                            style="padding-left:10px;background-color:black;width:200px;margin-left:10px;margin-bottom:5px;margin-top:5px;color:white;">
                            <i class="fa fa-plus" style="color: white;margin-right:10px;"></i>
                            Add new
                        </a>
                    </div>

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
                                    <h6><span>{{ count($items) }}</span> Product(s) found</h6>
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
                        @unless (count($items) > 0)
                            <h3>No items found in store</h3>
                        @else
                            @foreach ($items as $item)
                                <div wire:key="{{ $item->product_id }}" class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item" wire:click="viewItem({{ $item->product_id }})"
                                        style="cursor: pointer;">

                                        <div wire:loading wire:target="viewItem({{ $item->product_id }})">
                                            <livewire:components.loader />
                                        </div>

                                        <div class="product__item__pic set-bg" data-setbg="{{ asset($item->image) }}">
                                        </div>

                                        <span style="color:{{ $item->qty == 0 ? 'red' : 'green' }};font-weight:bold;">
                                            {{ $item->qty == 0 ? 'Out of stock' : 'In stock' }}
                                        </span>

                                        <div class="product__item__text">
                                            <h6>
                                                <a>{{ $item->name }}</a>
                                            </h6>

                                            <h5>R{{ $item->price }}</h5>
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
