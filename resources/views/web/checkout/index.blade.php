@extends('web.layout.app')

@section('page_title')
    Sakoon Pharmacy
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </div>
</nav>
<main id="content" class="page-section sp-inner-page checkout-area-padding space-db--20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="checkout-form">
                    <div class="row row-40">
                        <div class="col-12">
                            <h1 class="quick-title">CHECKOUT</h1>
                            <div class="checkout-quick-box">
                                <p>
                                    <i class="far fa-sticky-note"></i>Have a coupon? 
                                    <a href="javascript:" class="slide-trigger" data-bs-target="#quick-cupon">
                                        Click here to enter your code
                                    </a>
                                </p>
                            </div>
                            <div class="checkout-slidedown-box" id="quick-cupon">
                                <form action="https://htmldemo.net/petmark/petmark/">
                                    <div class="checkout_coupon">
                                        <input type="text" class="mb-0" placeholder="Coupon Code">
                                        <a href="#" class="btn btn-black">Apply coupon</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-7 mb--20">
                            <div id="billing-form" class="mb-40">
                                <h4 class="checkout-title">Billing Address</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Name*</label>
                                        <input type="text" placeholder="Name" id="name" value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address" id="email" value="{{ auth()->user()->email }}">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Phone no*</label>
                                        <input type="text" placeholder="Phone number" id="contact_number" value="{{ auth()->user()->contact_number }}">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>City*</label>
                                        <select class="nice-select" id="city_id">
                                            <option>--Select--</option>
                                            @foreach(cityList() as $city)
                                            <option value="{{ $city->id }}" {{ $city->id == auth()->user()->city_id ? 'selected' : ''}}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Address*</label>
                                        <input type="text" placeholder="Address line 1" id="address" value="{{ auth()->user()->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="order-note-block mt--30">
                                <label for="description">Order notes</label>
                                <textarea id="description" cols="30" rows="10" class="order-note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="checkout-cart-total">
                                        <h2 class="checkout-title">YOUR ORDER</h2>
                                        <h4>Product <span>Total</span></h4>
                                        <ul>
                                            @foreach(auth()->user()->cartProducts as $row)
                                            <li>
                                                <span class="left">
                                                    {{ Str::limit($row->product->name, 35).' X '. $row->quantity }}
                                                </span>
                                                <span class="right">
                                                    &#8360; {{ $row->price->new_price }}
                                                </span>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <p>Sub Total 
                                            <span>&#8360; {{ auth()->user()->cartAmount() }}</span>
                                        </p>
                                        <p>Shipping Fee 
                                            <span>&#8360; {{ settings('shiping_charges') }}</span>
                                        </p>
                                        <h4>Grand Total 
                                            <span>&#8360; {{ auth()->user()->cartAmount() + settings('shiping_charges') }}</span>
                                        </h4>
                                        <div class="method-notice mt--25">
                                            <article>
                                                <h3 class="d-none sr-only">blog-article</h3>
                                                Sorry, it seems that there are no available payment methods for your state. Please contact us if you
                                                require
                                                assistance
                                                or wish to make alternate arrangements.
                                            </article>
                                        </div>
                                        <div class="term-block">
                                            <input type="checkbox" id="accept_terms2">
                                            <label for="accept_terms2">I’ve read and accept the terms & conditions</label>
                                        </div>
                                        <button class="place-order w-100 placeOrder">Place order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#city_id').select2();
    });
</script>
@endsection