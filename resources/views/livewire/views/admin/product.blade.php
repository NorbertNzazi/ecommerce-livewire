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

                        <div class="col-lg-12 col-md-12">
                            <div
                                class="product__details__pic mt-5 mb-5 d-flex justify-content-center align-items-center">
                                <div class="product__details__pic__item" style="width: 100px;margin-right:50px;">

                                    <img class="product__details__pic__item--large"
                                        src="{{ $image ? $image->temporaryUrl() : asset($item->image) }}" alt=""
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>

                                <div class="d-flex flex-column">
                                    <span>
                                        @error('image')
                                            @include('components.field-error', [
                                                'message' => $message,
                                            ])
                                        @enderror
                                    </span>

                                    <input type="file"
                                        style="background-color: #000; border-radius: 10px; color: #fff;"
                                        accept=".jpg, .jpeg, .png" wire:model.live="image">
                                </div>
                            </div>

                            <form wire:submit.prevent="saveProduct()" style="width:100%;" class="d-flex flex-column">

                                <div wire:loading wire:target="saveProduct()">
                                    <livewire:components.loader />
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkout__input">
                                            <h6 style="color: #000;">Name
                                                <span>*
                                                    @error('name')
                                                        @include('components.field-error', [
                                                            'message' => $message,
                                                        ])
                                                    @enderror
                                                </span>
                                            </h6>
                                            <input type="text" wire:model.live="name">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="checkout__input">
                                            <h6 style="color: #000;">Price
                                                <span>*
                                                    @error('price')
                                                        @include('components.field-error', [
                                                            'message' => $message,
                                                        ])
                                                    @enderror
                                                </span>
                                            </h6>
                                            <input type="text" wire:model.live="price">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="checkout__input">
                                            <h6 style="color: #000;">In stock
                                                <span>*
                                                    @error('stock')
                                                        @include('components.field-error', [
                                                            'message' => $message,
                                                        ])
                                                    @enderror
                                                </span>
                                            </h6>
                                            <input type="text" wire:model.live="stock">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="checkout__input">
                                            <h6 style="color: #000;">Description
                                                <span>*
                                                    @error('description')
                                                        @include('components.field-error', [
                                                            'message' => $message,
                                                        ])
                                                    @enderror
                                                </span>
                                            </h6>
                                            <input type="text" wire:model.live="description">
                                        </div>
                                    </div>
                                </div>


                                <div class="checkout__input">
                                    <button type="submit" class="site-btn" style="background-color: #000;">
                                        Save
                                    </button>
                                </div>
                                {{-- </div> --}}
                            </form>

                            <hr>

                            <p style="color: red;font-weight:bold;">Procceed with caution</p>

                            <button class="site-btn" style="background-color: red;" wire:click="deleteProduct()"
                                wire:confirm="Are you sure you want to delete this prooduct?">
                                Delete
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</div>
