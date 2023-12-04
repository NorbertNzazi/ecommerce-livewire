<div>
    <!-- Checkout Section Begin -->
    <section class="hero">
        <div class="container">

            <div wire:loading wire:target="getLink()">
                <livewire:components.loader />
            </div>

            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-5" style="text-align:center;">
                    Remember your password? <a href="{{ route('login') }}">Click here</a> to
                    login
                </h6>

                <form wire:submit.prevent="getLink()">
                    <div class="row flex justify-center align-center">
                        <div class="col-lg-3 col-md-12">
                        </div>

                        <div class="checkout__order" style="background-color: #f6f6f6;border-radius:5px;width:50%;">

                            {{-- Email address --}}
                            <div class="checkout__input">
                                <h6 style="color: #000;">Email Address
                                    <span>*
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </h6>
                                <input type="email" wire:model.live="email">
                            </div>

                            <div class="checkout__input">
                                <button type="submit" class="site-btn" style="background-color: #000;">
                                    Submit
                                </button>
                            </div>

                            <p style="color: #000;font-weight:lighter;">
                                Please enter your email address to receive your password reset link
                            </p>

                        </div>

                        <div class="col-lg-3 col-md-12">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>
