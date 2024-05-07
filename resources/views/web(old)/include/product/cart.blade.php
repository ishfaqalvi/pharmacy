@php($cart = cart())
<div id="shiping_charges" data-shipping-charges="{{ settings('shiping_charges') ?? 0 }}"></div>
<div class="cart-widget slide-down--btn">
    <div class="cart-icon">
        <i class="ion-bag"></i>
        <span class="cart-count-badge">
            {{ $cart['count'] }}
        </span>
    </div>
    <div class="cart-text">
        <span class="d-block">Your cart</span>
        <strong>
            <span class="amount">
                <span class="currencySymbol">&#8360; {{ $cart['amount'] }}</span> 
            </span>
        </strong>
    </div>
</div>
<div class="slide-down--item ">
    <div class="cart-widget-box">
        <ul class="cart-items" id="cartItems">
            {!! $cart['dropdownHtml'] !!}
        </ul>
    </div>
</div>