<nav class="navbar navbar-expand-lg main_menu">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset(config('settings.logo')) }}" alt="FoodPark" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['home']) }}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['product.index']) }}"
                        href="{{ route('product.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['chef']) }}" href="{{ route('chef') }}">chefs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['blogs']) }}" href="{{ route('blogs') }}">blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['about']) }}" href="{{ route('about') }}">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['contact.*']) }}"
                        href="{{ route('contact.index') }}">contact</a>
                </li>
            </ul>
            <ul class="menu_icon d-flex flex-wrap">
                <li>
                    <a href="#" class="menu_search"><i class="far fa-search"></i></a>
                    <div class="fp__search_form">
                        <form action="{{ route('product.index') }}" method="GET">
                            <span class="close_search"><i class="far fa-times"></i></span>
                            <input type="text" name="search" placeholder="Search . . .">
                            <button type="submit">search</button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="cart_icon"><i class="fas fa-shopping-basket"></i> <span
                            class="cart_count">{{ count(Cart::content()) }}</span></a>
                </li>
                <li>
                    <a href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                </li>
                <li>
                    <a class="common_btn" href="#" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">reservation</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="fp__menu_cart_area">
    <div class="fp__menu_cart_boody">
        <div class="fp__menu_cart_header">
            <h5>total item (<span class="cart_count" style="font-size: 16px">{{ count(Cart::content()) }}</span>)</h5>
            <span class="close_cart"><i class="fal fa-times"></i></span>
        </div>
        <ul class="cart_contents">
            @foreach (Cart::content() as $cartProduct)
                <li>
                    <div class="menu_cart_img">
                        <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu"
                            class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title"
                            href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{!! $cartProduct->name !!}
                        </a>
                        <p class="size">Qty: {{ $cartProduct->qty }}</p>

                        <p class="size">{{ @$cartProduct->options->product_size['name'] }}
                            {{ @$cartProduct->options->product_size['price'] ? '(' . currencyPosition(@$cartProduct->options->product_size['price']) . ')' : '' }}
                        </p>
                        @foreach ($cartProduct->options->product_options as $cartProductOption)
                            <span class="extra">{{ $cartProductOption['name'] }}
                                ({{ currencyPosition($cartProductOption['price']) }})
                            </span>
                        @endforeach
                        <p class="price">{{ currencyPosition($cartProduct->price) }}</p>
                    </div>
                    <span class="del_icon" onclick="removeProductFromSidebar('{{ $cartProduct->rowId }}')"><i
                            class="fal fa-times"></i></span>
                </li>
            @endforeach

        </ul>
        <p class="subtotal">sub total <span class="cart_subtotal">{{ currencyPosition(cartTotal()) }}</span></p>
        <a class="cart_view" href="{{ route('cart.index') }}"> view cart</a>
        <a class="checkout" href="{{ route('checkout.index') }}">checkout</a>
    </div>
</div>

<!-- Reservation Model Start -->
@php
    $reservationTimes = App\Models\ReservationTime::where('status', 1)->orderBy('id', 'DESC')->get();
@endphp
<div class="fp__reservation">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Book a Table</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reservation.store') }}" method="POST" class="fp__reservation_form">
                        @csrf
                        <input type="text" name="name" class="reservation_input" placeholder="Name">
                        <input type="text" name="phone" class="reservation_input" placeholder="Phone">
                        <input type="date" name="date" class="reservation_input">

                        <select name="time" class="reservation_input nice-select">
                            <option value="">select time</option>
                            @foreach ($reservationTimes as $time)
                                <option value="{{ $time->start_time }}-{{ $time->end_time }}">
                                    {{ $time->start_time }} to {{ $time->end_time }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="persons" class="reservation_input" placeholder="Persons">
                        <button type="submit">book table</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reservation Model End -->

@push('frontend-js')
    <script>
        $(document).ready(function() {
            $('.fp__reservation_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('reservation.store') }}',
                    data: formData,
                    beforeSend: function() {
                        $('.btn_submit').html(
                            `<span class="spinner-border text-light"> <span>`);
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('.fp__reservation_form').trigger("reset");
                        $('#staticBackdrop').modal('hide');

                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                            $('.btn_submit').html(`Book Table`);
                        })
                    },
                    complete: function() {
                        $('.btn_submit').html(`Book Table`);
                    }
                })
            })
        })
    </script>
@endpush
