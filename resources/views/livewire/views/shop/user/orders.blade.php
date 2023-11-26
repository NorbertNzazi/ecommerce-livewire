<div>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <livewire:views.shop.user.order-selection />
                </div>


                <div class="col-lg-8">

                    <h2 style="text-align:center;" class="mb-5">Order Products</h2>

                    @if (Session::has('success'))
                        @include('components.alert', [
                            'message' => Session::get('success'),
                            'type' => 'success',
                        ])
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</div>
