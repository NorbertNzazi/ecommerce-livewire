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
                                    <h6><span>{{ count($categories) }}</span> Category(ies) found</h6>
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
                        @unless (count($categories) > 0)
                            <h3>No categories found</h3>
                        @else
                            @foreach ($categories as $category)
                                <div wire:key="{{ $category->payment_id }}"
                                    class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center">
                                    <div class="product__item d-flex flex-column justify-content-center"
                                        style="text-align:center;">

                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('img/category.jpg') }}"
                                            style="width: 150px; height: 50px;object-fit:contain;">
                                        </div>

                                        <span style="color:green;">
                                            {{ $category->description }}
                                        </span>

                                        <span style="color:red;">
                                            {{ $category->transaction_id }}
                                        </span>

                                        <div class="product__item__text">
                                            <h6>
                                                <a>{{ $category->name }}</a>
                                            </h6>
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
