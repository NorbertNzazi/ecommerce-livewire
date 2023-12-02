<div>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                {{-- <h4 style="margin-bottom: 50px;">Billing Details</h4> --}}

                <form wire:submit.prevent="pay">

                    <div wire:loading wire:target="pay">
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
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <button type="submit" class="site-btn" style="background-color: black;">Pay</button>

                                <div class="checkout__order__products mt-5">Marketplace Access</div>
                                <div class="checkout__order__total">Total <span>{{ $amount }}</span></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>
