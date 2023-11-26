<div>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-end">
                    <h6>
                        Forgot your password? <a href="#">Click here</a> to
                        request a reset password link
                    </h6>
                </div>
            </div>

            <div class="checkout__form">
                <h3>Store In</h3>

                <div wire:loading wire:target="checkEmail()">
                    <livewire:components.loader />
                </div>

                @if (!$emailProcessed)
                    <form wire:submit.prevent="checkEmail">
                        <div class="row flex justify-center align-center">
                            <div class="col-lg-3 col-md-12">
                            </div>

                            <div class="checkout__order" style="background-color: #cfcfcf;border-radius:5px;width:50%;">

                                {{-- Email address --}}
                                <div class="checkout__input">
                                    <p>Email Address
                                        <span>*
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </p>
                                    <input type="email" wire:model.live="email">
                                </div>


                                {{-- Verify email existence --}}
                                @if ($email)
                                    <div class="checkout__input">
                                        <button type="submit" class="site-btn" style="background-color: #000;">
                                            Submit
                                        </button>
                                    </div>
                                @endif


                                <p>
                                    Please enter your email address to continue
                                </p>

                            </div>

                            <div class="col-lg-3 col-md-12">
                            </div>
                        </div>
                    </form>
                @else
                    @if ($auth == 'login')
                        <form wire:submit.prevent="login">
                            <div class="row flex justify-center align-center">
                                <div class="col-lg-3 col-md-12">
                                </div>

                                <div class="checkout__order"
                                    style="background-color: #cfcfcf;border-radius:5px;width:50%;">

                                    {{-- Email address --}}
                                    <div class="checkout__input">
                                        <p>Email Address
                                            <span>*
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </p>
                                        <input type="email" wire:model.live="email" @disabled($emailProcessed)>
                                    </div>


                                    {{-- Password --}}
                                    <div class="checkout__input">
                                        <p>Password
                                            <span>*
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </p>
                                        <input type="password" wire:model.live="password">
                                    </div>

                                    @if ($password && $email)
                                        <div class="checkout__input">
                                            <button type="submit" class="site-btn" style="background-color: #000;">
                                                {{ $auth == 'login' ? 'Login' : 'Register' }}
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-lg-3 col-md-12">
                                </div>
                            </div>
                        </form>
                    @else
                        <form wire:submit.prevent="register">
                            <div class="row flex justify-center align-center">
                                <div class="col-lg-3 col-md-12">
                                </div>

                                <div class="checkout__order"
                                    style="background-color: #cfcfcf;border-radius:5px;width:50%;">

                                    {{-- Email address --}}
                                    <div class="checkout__input">
                                        <p>Email
                                            <span>*
                                                @error('email')
                                                    @include('components.field-error', [
                                                        'message' => $message,
                                                    ])
                                                @enderror
                                            </span>
                                        </p>
                                        <input type="email" wire:model.live="email" @disabled($emailProcessed)>
                                    </div>


                                    <div class="checkout__input">
                                        <p>Name
                                            <span>*
                                                @error('name')
                                                    @include('components.field-error', [
                                                        'message' => $message,
                                                    ])
                                                @enderror
                                            </span>
                                        </p>
                                        <input type="text" wire:model.live="name">
                                    </div>


                                    <div class="checkout__input">
                                        <p>Surname
                                            <span>*
                                                @error('surname')
                                                    @include('components.field-error', [
                                                        'message' => $message,
                                                    ])
                                                @enderror
                                            </span>
                                        </p>
                                        <input type="text" wire:model.live="surname">
                                    </div>


                                    {{-- Password --}}
                                    <div class="checkout__input">
                                        <p>Password
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
                                        <p>Password Confirmation
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

                                    @if ($password && $email && $name && $surname)
                                        <div class="checkout__input">
                                            <button type="submit" class="site-btn" style="background-color: #000;">
                                                Submit
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-lg-3 col-md-12">
                                </div>
                            </div>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>
