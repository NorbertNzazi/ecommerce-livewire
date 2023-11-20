<div>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <livewire:components.sidebar />
                </div>


                <div class="col-lg-9">
                    <div class="hero__search">

                        <livewire:components.search-input />

                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+27 606 447 885</h5>
                                <span>Support 24/7 </span>
                            </div>
                        </div>
                    </div>

                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="name-asc">Name-Asc</option>
                                        <option value="name-desc">Name-Desc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @unless (count($items) > 0)
                            <h1>No items found in store</h1>
                        @else
                            @foreach ($items as $item)
                                <div wire:key="{{ $item->item_id }}" class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item" style="cursor: pointer;"
                                        wire:click="viewItem({{ $item->item_id }})">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset($item->image) }}">
                                            <ul class="product__item__pic__hover">
                                                <li>
                                                    <i wire:click.prevent="addToWishlist()" class="fa fa-heart"></i>
                                                </li>
                                                <li>
                                                    <i wire:click="addToCart({{ $item->item_id }})"
                                                        class="fa fa-shopping-cart">
                                                    </i>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="product__item__text">
                                            <h6>
                                                <a href="#">{{ $item->name }}</a>
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
