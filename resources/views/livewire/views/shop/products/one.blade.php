<div>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{ asset($product->image) }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}</h3>
                        {{-- <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div> --}}
                        <div class="product__details__price">R{{ $product->price }}</div>
                        <p>{{ $product->description }}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" value="1"
                                        style="background-color: #000;border-radius:10px;color:#fff;"
                                        wire:model.live="qty" min="1">
                                </div>
                            </div>
                        </div>

                        <button class="primary-btn" style="border-radius:10px;border-style:none;"
                            wire:click="addToCart()">ADD
                            TO CARD
                        </button>

                        {{-- <a href="#" class="heart-icon"
                            style="background-color: #000;border-radius:10px;color:#fff;">
                            <span class="icon_heart_alt"></span>
                        </a> --}}
                        <ul>
                            <li><b>Availability</b> <span
                                    style="font-weight:bold;color: {{ $product->qty > 0 ? 'green' : 'red' }}">{{ $product->qty > 0 ? 'In stock' : 'Out of stock' }}</span>
                            </li>
                            <li><b>Shipping</b> <span>03 days shipping</li>
                            {{-- <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
</div>
