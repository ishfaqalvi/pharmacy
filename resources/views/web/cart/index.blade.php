@extends('web.layout.app')

@section('page_title')
    Sakoon Pharmacy
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </div>
</nav>
@php($cart = cart())
<div class="cart_area cart-area-padding sp-inner-page--top">
    <div class="container">
        <div class="page-section-title">
            <h1>SHOPPING CART</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cart-table table-responsive mb--40">
                    <table class="table" id="cartTable">
                        <thead>
                            <tr>
                                <th class="pro-remove"></th>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">All Price</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody id="cartTableBody">
                            {!! $cart['tableHtml'] !!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cart-section-2 sp-inner-page--bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mb--15">
                {{-- <div class="cart-block-title">
                    <h2>YOU MAY BE INTERESTED IN…</h2>
                </div>
                <div class="petmark-slick-slider border normal-slider arrow-type-two" data-slick-setting='{
                    "autoplay": true,
                    "autoplaySpeed": 3000,
                    "slidesToShow": 3,
                    "arrows": true
                }'
                data-slick-responsive='[
                    {"breakpoint":991, "settings": {"slidesToShow": 2} },
                    {"breakpoint":768, "settings": {"slidesToShow": 1} }
                ]'>
                @foreach(auth()->user()->wishProducts as $wish)
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="{{ route('product.show',$wish->product_id) }}">
                                    <img src="{{ $wish->product->thumbnail }}" alt="">
                                </a>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>{{ Str::limit($wish->product->name, 20) }}</h3>
                                <div class="price text-red">
                                    @php($price = $wish->product->price())
                                    @if($price->new_price != $price->old_price)
                                        <span class="old">&#8360; {{ $price->old_price }}</span>
                                    @endif
                                    <span>&#8360; {{ $price->new_price }}</span>
                                </div>
                                <div class="btn-block">
                                    <a href="javascript:void(0)" class="addToCart btn btn-outlined btn-rounded" data-product-id="{{ $wish->product->id }}" data-price-id="{{ $price->id }}">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div> --}}
            </div>
            <div class="col-lg-6 col-12 d-flex">
                <div class="cart-summary">
                    <div class="cart-summary-wrap">
                        <h4><span>Cart Summary</span></h4>
                        <p>Sub Total
                            <span class="text-primary sub-total">&#8360; {{ $cart['amount'] }}</span>
                        </p>
                        <p>Shipping Cost
                            <span class="text-primary">&#8360; {{ settings('shiping_charges') ?? '0' }}
                            </span>
                        </p>
                        <h2>Grand Total <span class="text-primary grand-total">
                            &#8360; {{ $cart['amount'] + settings('shiping_charges') }}
                        </span></h2>
                    </div>
                    <div class="cart-summary-button">
                        <a href="{{ route('checkout') }}" class="checkout-btn c-btn">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
