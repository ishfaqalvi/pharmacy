@extends('web.layout.app')

@section('page_title')
    Sakoon Pharmacy
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
        </ol>
    </div>
</nav>
<div class="cart_area sp-inner-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-title">Brand</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-remove">Remove</th>
                                <th class="pro-remove">Add to Cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(auth()->user()->wishProducts as $wish)
                            <tr id="wishlistItem{{ $wish->id }}">
                                <td class="pro-thumbnail">
                                    <a href="{{ route('product.show', $wish->product_id)}}">
                                        <img src="{{ $wish->product->thumbnail }}" alt="Product">
                                    </a>
                                </td>
                                <td class="pro-title">
                                    <a href="#">
                                        {{ $wish->product->name }}
                                    </a>
                                </td>
                                <td class="pro-title">
                                    {{ $wish->product->brand->name }}
                                </td>
                                <td class="pro-price">
                                    <span>&#8360; {{ $wish->product->price()->new_price }}</span>
                                </td>
                                <td class="pro-remove">
                                    <a href="javascript:void(0)" class="remove-from-wishlist" data-id="{{ $wish->id }}">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td class="pro-remove">
                                    <a href="javascript:void(0)" class="addToCart" data-product-id="{{ $wish->product->id }}" data-price-id="{{ $wish->product->price()->id }}">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No product available in wishlist</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection