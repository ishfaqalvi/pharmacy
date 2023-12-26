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
                    <table class="table">
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
                        <tbody>
                            @foreach($cart['products'] as $item)
                            <tr>
                                <td class="pro-remove">
                                    <form action="{{ route('cart.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="link">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="pro-thumbnail">
                                    <a href="{{ route('product.show',$item->product_id )}}">
                                        <img src="{{ $item->product->thumbnail }}" alt="Product">
                                    </a>
                                </td>
                                <td class="pro-title">
                                    <a href="{{ route('product.show',$item->product_id )}}">
                                        {{ Str::limit($item->product->name, 50) }}
                                    </a>
                                </td>
                                <td class="pro-price">
                                    @foreach($item->product->prices as $price)
                                    @if($price->id == $item->price_id)
                                        @php($check = 'checked')
                                    @else
                                        @php($check = '')
                                    @endif
                                    <div class="form-check">
                                        <input 
                                            class="form-check-input" 
                                            type="radio" 
                                            name="price-{{$item->id}}"
                                            data-price-id="{{ $price->id }}" 
                                            id="price{{ $price->id }}" 
                                            {{ $check }}
                                            >
                                        <label class="form-check-label" for="price{{ $price->id }}">
                                            <span>&#8360; {{ $price->new_price.' ('.$price->title.' )' }}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </td>
                                <td class="pro-price">
                                    <span>&#8360; {{ $item->price->new_price }}</span>
                                </td>
                                <td class="pro-quantity">
                                    <div class="pro-qty">
                                        <div class="count-input-block">
                                            <input 
                                                type="number" 
                                                class="form-control text-center item-quantity"
                                                name="quantity-{{ $item->id }}" 
                                                value="{{ $item->quantity }}"
                                                min="1"
                                                >
                                        </div>
                                    </div>
                                </td>
                                <td class="pro-subtotal">
                                    <span>
                                        &#8360; {{ $item->price->new_price * $item->quantity }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="actions">
                                    <form action="{{ route('cart.update') }}" method="POST" id="update_cart_form">
                                        @csrf
                                        <div class="update-block text-end">
                                            <input type="hidden" name="data" id="selectedItems">
                                            <input type="button" onclick="updateCart()" class="btn-black" name="update_cart" value="Update cart">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function updateCart() {
        var selectedItems = [];
        document.querySelectorAll('.item-quantity').forEach(function(quantityField) {
            var itemId = quantityField.name.split('-')[1];
            var quantity = quantityField.value;
            var selectedPriceRadio = document.querySelector('input[name="price-' + itemId + '"]:checked');
            if(selectedPriceRadio) {
                var priceId = selectedPriceRadio.getAttribute('data-price-id');
                selectedItems.push({ itemId: itemId, priceId: priceId, quantity: quantity });
            }
        });
        document.getElementById('selectedItems').value = JSON.stringify(selectedItems);
        document.getElementById('update_cart_form').submit();
    }
    // updateCart();
</script>
@endsection

@section('script')
<!-- <script>
    $(document).ready(function() {
        $('#update-cart').click(function() {
            var selectedItems = [];

            $('.item-quantity').each(function() {
                var quantityField = $(this);
                var itemId = quantityField.attr('name').split('-')[1];
                var quantity = quantityField.val();
                var selectedPriceRadio = $('input[name="price-' + itemId + '"]:checked');

                if(selectedPriceRadio.length) {
                    var priceId = selectedPriceRadio.data('price-id');
                    selectedItems.push({ itemId: itemId, priceId: priceId, quantity: quantity });
                }
            });
            console.log(JSON.stringify(selectedItems));
            // $('#selectedItems').val(JSON.stringify(selectedItems));

            // $('#cart-form').submit();
        });
    });
</script> -->

<!-- <script>
    $('input[name=proceed]').on('click', function() {
        var ids = [];
        $("input:checkbox[name=program_id]:checked").each(function() {
            ids.push($(this).val());
        });
        $('input[name=ids]').val(ids);
    });
</script> -->
@endsection