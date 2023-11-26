<div>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                {{-- <h4 style="margin-bottom: 50px;">Billing Details</h4> --}}

                <form wire:submit.prevent="checkout">

                    <div wire:loading wire:target="checkout">
                        <livewire:components.loader />
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-6">

                            <h5 style="margin-bottom: 20px;color:#000;font-weight:bold;">Payment Details</h5>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Account Holder<span> *</span></p>

                                        <input type="text" placeholder="As reflected on card"
                                            wire:model.live="accountHolder">

                                        @error('accountHolder')
                                            @include('components.field-error', ['message' => $message])
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Card Number<span> *</span></p>

                                        <input type="number" placeholder="16-digits card number"
                                            wire:model.live="cardNumber">

                                        @error('cardNumber')
                                            @include('components.field-error', ['message' => $message])
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Expiry Date<span>*</span></p>

                                        <input type="date" placeholder="Expiry date" wire:model.live="cardExpiry">

                                        @error('cardExpiry')
                                            @include('components.field-error', ['message' => $message])
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>CVV<span>*</span></p>

                                        <input type="number" placeholder="CVV" wire:model.live="cardCvv">

                                        @error('cardCvv')
                                            @include('components.field-error', ['message' => $message])
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Would you like your order to be shipped?

                                    <input type="checkbox" id="diff-acc" wire:model.live="shipment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            @if ($shipment)
                                <h5 style="margin-bottom: 20px;margin-top:50px;color:#000;font-weight:bold;">Shipping
                                </h5>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Street Address<span>*</span></p>
                                            <input type="text" placeholder="Street address"
                                                wire:model.live="streetAddress">

                                            @error('streetAddress')
                                                @include('components.field-error', ['message' => $message])
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Additional Details<span></span></p>
                                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)"
                                                wire:model.live="additionalDetails">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Town/City<span>*</span></p>
                                            <input type="text" placeholder="Town/City" wire:model.live="townCity">

                                            @error('townCity')
                                                @include('components.field-error', ['message' => $message])
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Postcode/ZIP<span></span></p>
                                            <input type="number" placeholder="Postcode/ZIP"
                                                wire:model.live="postalCode">

                                            @error('postalCode')
                                                @include('components.field-error', ['message' => $message])
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout__input">
                                    <p>Order notes<span></span></p>
                                    <input type="text"
                                        placeholder="Notes about your order, e.g. special notes for delivery."
                                        wire:model.live="orderNotes">
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <button type="submit" class="site-btn">PLACE ORDER</button>

                                <h4 style="margin-top: 25px;">Your Order</h4>

                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach ($cartItems as $cartItem)
                                        <li wire:key={{ $cartItem->cart_item_id }}>
                                            {{ $cartItem->product->name }}
                                            <span>R{{ $cartItem->qty * $cartItem->product->price }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__total">Total <span>R{{ $cartItemsTotal }}</span></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>
