<div>

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @unless (count($cartItems) > 0)
                                    <p>No items found</p>
                                @else
                                    @foreach ($cartItems as $cartItem)
                                        <tr wire:key="{{ $cartItem->cart_item_id }}">

                                            <div wire:loading wire:target="removeFromCart({{ $cartItem->cart_item_id }})">
                                                <livewire:components.loader />
                                            </div>

                                            <td class="shoping__cart__item">
                                                <img src="{{ asset($cartItem->item->image) }}" alt="">
                                                <h5>{{ $cartItem->item->name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                R{{ $cartItem->item->price }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" min="1" value="{{ $cartItem->qty }}"
                                                            wire:model.live="newQty.{{ $cartItem->cart_item_id }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                R{{ $cartItem->item->price * $cartItem->qty }}
                                            </td>

                                            <td class="shoping__cart__item__close">
                                                <span style="color: green; margin-right:50px;"
                                                    wire:click="updateQty({{ $cartItem->cart_item_id }})"
                                                    class="icon_check">
                                                </span>
                                            </td>

                                            <td class="shoping__cart__item__close">
                                                <span style="color: red;"
                                                    wire:click="removeFromCart({{ $cartItem->cart_item_id }})"
                                                    wire:confirm="Remove item?" class="icon_close">
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endunless
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__cart__btns">
                        <a style="background-color: #000;border-radius:5px;color:#fff;" href="{{ route('home') }}"
                            class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout" style="background-color: #000;border-radius:5px;">
                        <h5 style="color:#fff;">Cart Total: R{{ $cartItemsTotal }}</h5>
                        {{-- <ul>
                            <li>Subtotal <span>$454.98</span></li>
                            <li>Total <span>R{{ $cartItemsTotal }}</span></li>
                        </ul> --}}
                        <a style="border-radius:5px;" href="{{ route('checkout') }}" class="primary-btn">PROCEED TO
                            CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

</div>
