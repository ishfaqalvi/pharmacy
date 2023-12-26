@php($cartData = cart())
<div class="cart-widget slide-down--btn">
    <div class="cart-icon">
        <i class="ion-bag"></i>
        <span class="cart-count-badge">
            {{ $cartData['itmes'] }}
        </span>
    </div>
    <div class="cart-text">
        <span class="d-block">Your cart</span>
        <strong>
            <span class="amount">
                <span class="currencySymbol">&#8360; </span> {{ $cartData['total'] }}
            </span>
        </strong>
    </div>
</div>
<div class="slide-down--item ">
    <div class="cart-widget-box">
        <ul class="cart-items">
            @foreach($cartData['products'] as $row)
            <li class="single-cart">
                <a href="{{ route('product.show',$row->product_id )}}" class="cart-product">
                    <div class="cart-product-img">
                        <img src="{{ $row->product->thumbnail }}" alt="Selected Products">
                    </div>
                    <div class="product-details">
                        <h4 class="product-details--title"> {{ $row->product->name }}</h4>
                        <span class="product-details--price">{{ $row->quantity.' x' }} &#8360; {{ $row->price->new_price }}</span>
                    </div>
                    <form action="{{ route('cart.destroy',$row->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="link">
                            <span class="cart-cross">x</span>
                        </button>
                    </form>
                </a>
            </li>
            @endforeach
            <li class="single-cart">
                <div class="cart-product__subtotal">
                    <span class="subtotal--title">Total</span>
                    <span class="subtotal--price">&#8360; {{ $cartData['total'] }}</span>
                </div>
            </li>
            <li class="single-cart">
                <div class="cart-buttons">
                    <a href="{{ route('cart.index')}}" class="btn btn-outlined">View Cart</a>
                    <a href="checkout.html" class="btn btn-outlined">Check Out</a>
                </div>
            </li>
        </ul>
    </div>
</div>