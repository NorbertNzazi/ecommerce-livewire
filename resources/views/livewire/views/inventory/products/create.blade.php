<div>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">

            @if (Session::has('success'))
                @include('components.alert', [
                    'message' => Session::get('success'),
                    'type' => 'success',
                ])
            @endif

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="product__details__pic mb-5 d-flex justify-content-center align-items-center">
                        <div class="product__details__pic__item" style="width: 100px;margin-right:50px;">

                            <img class="product__details__pic__item--large"
                                src="{{ $image ? $image->temporaryUrl() : $imagePlaceholder }}" alt=""
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

                            <input type="file" style="background-color: #000; border-radius: 10px; color: #fff;"
                                accept=".jpg, .jpeg, .png" wire:model="image">
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
                                    <input type="text" wire:model="name">
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
                                    <input type="text" wire:model="price">
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
                                    <input type="text" wire:model="stock">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="checkout__input d-flex flex-column">
                                    <h6 style="color: #000;">Category
                                        <span>*
                                            @error('category')
                                                @include('components.field-error', [
                                                    'message' => $message,
                                                ])
                                            @enderror
                                        </span>
                                    </h6>

                                    <select style="width: 100%;" wire:model="category">
                                        @unless (count($categories) > 0)
                                            <option>No categories</option>
                                        @else
                                            <option>Choose category</option>
                                            @foreach ($categories as $cat)
                                                <option wire:key="{{ $cat->category_id }}" value="{{ $cat->category_id }}">
                                                    {{ $cat->name }}</option>
                                            @endforeach
                                        @endunless
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
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
                                    <input type="text" wire:model="description">
                                </div>
                            </div>
                        </div>


                        <div class="checkout__input">
                            <button type="submit" class="site-btn" style="background-color: #000;">
                                Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
