<div>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li>
                                    <i class="fa fa-envelope"></i> support@store-in.co.za
                                </li>
                                <li>Location, si laa</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href><i class="fa fa-facebook"></i></a>
                                <a href><i class="fa fa-twitter"></i></a>
                                <a href><i class="fa fa-linkedin"></i></a>
                                <a href><i class="fa fa-pinterest-p"></i></a>
                            </div>

                            @if (Auth::check())
                                <div class="header__top__right__auth flex">
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-user"></i>
                                        {{ Auth::user()->name }}
                                    </a>
                                </div>
                                |
                                <div class="header__top__right__auth flex">
                                    <a style="font-weight: bold;cursor: pointer;" wire:click="logout()"> Logout</a>
                                </div>
                            @else
                                <div class="header__top__right__auth flex">
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-user"></i>
                                        Login/Register
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Route::currentRouteName() !== 'auth')
            <div class="container"
                style="border-style:solid;border-bottom-width:2px;border-top-width:0px;border-left-width:0px;border-right-width:0px;margin-bottom:30px;border-bottom-color:#d8d8d8;">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo" style="cursor: pointer;">
                            <img class="product__details__pic__item--large" src="{{ asset('img/profile.png') }}"
                                alt="" style="width: 50px; height: auto; object-fit: cover;"
                                wire:click="goto()">
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <nav class="header__menu">
                            <ul>
                                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a
                                        href="{{ route($user && $user->privileges == 'admin' ? 'admin-home' : 'home') }}">Home</a>
                                </li>

                                @if ($user && $user->privileges != 'admin')
                                    <li>
                                        <a>Menu</a>
                                        <ul class="header__menu__dropdown">
                                            <li><a href="{{ route('user-orders') }}">My Orders</a></li>
                                            <li><a href="{{ route('inventory') }}">Inventory</a></li>
                                        </ul>
                                    </li>
                                @endif

                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">

                        @if ($user && $user->privileges != 'admin')
                            <div class="header__cart">
                                <ul>
                                    <li>
                                        <a href="{{ route('cart') }}">
                                            <i class="fa fa-shopping-bag"></i>
                                            <span>{{ count($cartItems) }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="header__cart__price">Cart total: <span>R{{ $cartItemsTotal }}</span></div>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        @endif
    </header>
    <!-- Header Section End -->
</div>
