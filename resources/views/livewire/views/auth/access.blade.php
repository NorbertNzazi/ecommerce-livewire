<div>
    <!-- Checkout Section Begin -->
    <section class="hero">
        <div class="container">

            <div wire:loading wire:target="checkEmail()">
                <livewire:components.loader />
            </div>

            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-5" style="text-align:center;">
                    Forgot your password? <a href="{{ route('request-reset') }}">Click here</a> to
                    request a reset password link
                </h6>

                @if (!$emailProcessed)
                    <form wire:submit.prevent="checkEmail">
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


                                {{-- Verify email existence --}}
                                @if ($email)
                                    <div class="checkout__input">
                                        <button type="submit" class="site-btn" style="background-color: #000;">
                                            Submit
                                        </button>
                                    </div>
                                @endif


                                <p style="color: #000;font-weight:lighter;">
                                    Please enter your email address to continue
                                </p>

                            </div>

                            <div class="col-lg-3 col-md-12">
                            </div>
                        </div>
                    </form>
                @else
                    @if ($auth == 'login')

                        @if (Session::has('error'))
                            @include('components.alert', [
                                'message' => Session::get('error'),
                                'type' => 'error',
                            ])
                        @endif

                        @if (Session::has('success'))
                            @include('components.alert', [
                                'message' => Session::get('success'),
                                'type' => 'success',
                            ])
                        @endif

                        <form wire:submit.prevent="login">
                            <div class="row flex justify-center align-center">
                                <div class="col-lg-3 col-md-12">
                                </div>

                                <div class="checkout__order"
                                    style="background-color: #fff;border-radius:5px;width:50%;">

                                    <h3 class="mb-3">Welcome back {{ $verified_user }}</h3>

                                    {{-- Email address --}}
                                    <div class="checkout__input">
                                        <p style="color: #000;font-weight:lighter;">Email Address
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

                                        <p style="color: #000;font-weight:lighter;">Password
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
                                    style="background-color: #fff;border-radius:5px;width:50%;">

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
                                        <input type="email" wire:model.live="email" @disabled($emailProcessed)>
                                    </div>


                                    <div class="checkout__input">
                                        <p style="color: #000;font-weight:lighter;">Name
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
                                        <p style="color: #000;font-weight:lighter;">Surname
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

                                    @if ($password && $email && $name && $surname && $passwordConfirmation)
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
