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
                            <div class="product__details__pic d-flex flex-column align-items-center">
                                <div class="product__details__pic__item" style="width: 100px;">
                                    <img class="product__details__pic__item--large" src="{{ $imagePlaceholder }}"
                                        alt="" style="width: 50px; height: auto; object-fit: cover;">
                                </div>
                            </div>

                            <form wire:submit.prevent="createUser()" style="width:100%;" class="d-flex flex-column">

                                <div wire:loading wire:target="createUser()">
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
                                            <h6 style="color: #000;">Surname
                                                <span>*
                                                    @error('surname')
                                                        @include('components.field-error', [
                                                            'message' => $message,
                                                        ])
                                                    @enderror
                                                </span>
                                            </h6>
                                            <input type="text" wire:model.live="surname">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="checkout__input">
                                            <h6 style="color: #000;">Password
                                                <span>*
                                                    @error('password')
                                                        @include('components.field-error', [
                                                            'message' => $message,
                                                        ])
                                                    @enderror
                                                </span>
                                            </h6>
                                            <input type="text" wire:model.live="password">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="checkout__input">
                                            <h6 style="color: #000;">Password Confirmation
                                                <span>*
                                                    @error('passwordConfirmation')
                                                        @include('components.field-error', [
                                                            'message' => $message,
                                                        ])
                                                    @enderror
                                                </span>
                                            </h6>
                                            <input type="text" wire:model.live="passwordConfirmation">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="checkout__input">
                                            <h6 style="color: #000;">Email
                                                <span>*
                                                    @error('email')
                                                        @include('components.field-error', [
                                                            'message' => $message,
                                                        ])
                                                    @enderror
                                                </span>
                                            </h6>
                                            <input type="email" wire:model.live="email">
                                        </div>
                                    </div>


                                    <div class="col-6 d-flex align-items-center">
                                        <div class="checkout__input" style="padding-top:30px;">
                                            <div class="checkout__input__checkbox d-flex align-items-center">
                                                <label for="diff-acc">

                                                    <input type="checkbox" id="diff-acc" wire:model.live="can_sell">

                                                    <span class="checkmark"></span>
                                                    Grant user inventory access?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="checkout__input">
                                    <button type="submit" class="site-btn" style="background-color: #000;">
                                        Save
                                    </button>

                                    <button class="site-btn" style="background-color: red;" wire:click="resetForm()"
                                        wire:confirm="Are you sure you want to discard your unsaved changes?">
                                        Reset
                                    </button>
                                </div>
                                {{-- </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</div>
