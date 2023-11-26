<div>
    <section class="hero">
        <div class="container">

            @if (Session::has('success'))
                @include('components.alert', [
                    'message' => Session::get('success'),
                    'type' => 'success',
                ])
            @endif

            <div class="row">

                <div class="col-lg-2">
                </div>

                <div class="col-lg-8">
                    <h2 style="text-align:center;" class="mb-5">Inventory Management</h2>

                    <div class="row d-flex justify-content-center align-items-center">

                        @foreach ($cards as $card)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="{{ route($card['routeTo']) }}">
                                    <div class="product__item d-flex justify-content-center align-items-center"
                                        style="cursor: pointer;background-color:#e100ff;height:150px;border-radius:10px;text-align:center;color:white;">

                                        <div class="d-flex flex-column align-items-center">
                                            <span style="color: white;font-size:20px;">
                                                {{ $card['title'] }}
                                            </span>
                                            <span style="color: white;font-size:15px;">
                                                {{ $card['count'] }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-2">
                </div>
            </div>
        </div>
    </section>
</div>
