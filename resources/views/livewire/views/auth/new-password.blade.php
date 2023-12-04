<div>
    <!-- Checkout Section Begin -->
    <section class="hero">
        <div class="container">

            <div wire:loading wire:target="checkEmail()">
                <livewire:components.loader />
            </div>

            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-5" style="text-align:center;"><a href="{{ route('login') }}">Click here</a> to
                    login instead
                </h6>
                <form wire:submit.prevent="updatePassword()">
                    <div class="row flex justify-center align-center">
                        <div class="col-lg-3 col-md-12">
                        </div>

                        <div class="checkout__order" style="background-color: #fff;border-radius:5px;width:50%;">

                            {{-- Email address --}}
                            <div class="checkout__input">
                                <p style="color: #000;font-weight:lighter;">Email
                                    <span>*
                                        @error('email')
                                            @include('components.field-error', [
                                                'message' => $message,
                                            ])
                                        @enderror
                                    </span>
                                </p>
                                <input type="email" wire:model.live="email" readonly>
                            </div>


                            {{-- Password --}}
                            <div class="checkout__input">
                                <p style="color: #000;font-weight:lighter;">Password
                                    <span>*
                                        @error('password')
                                            @include('components.field-error', [
                                                'message' => $message,
                                            ])
                                        @enderror
                                    </span>
                                </p>
                                <input type="password" wire:model.live="password">
                            </div>


                            {{-- Password Confirmation --}}
                            <div class="checkout__input">
                                <p style="color: #000;font-weight:lighter;">Password Confirmation
                                    <span>*
                                        @error('passwordConfirmation')
                                            @include('components.field-error', [
                                                'message' => $message,
                                            ])
                                        @enderror
                                    </span>
                                </p>
                                <input type="password" wire:model.live="passwordConfirmation">
                            </div>

                            <div class="checkout__input">
                                <button type="submit" class="site-btn" style="background-color: #000;">
                                    Submit
                                </button>
                            </div>
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
