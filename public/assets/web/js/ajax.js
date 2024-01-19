$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.placeOrder').on('click', function(e) {
        e.preventDefault();
        var name        = $('#name').val();
        var email       = $('#email').val();
        var number      = $('#contact_number').val();
        var city_id     = $('#city_id').val();
        var address     = $('#address').val();
        var description = $('#description').val();
        if(!name || !email || !number || !city_id || !address) {
            toastr.warning('Please fill all required fields.');
        }else{
            $("#overlay").show('slow');
            $.ajax({
                url: '/order/store',
                type: 'POST',
                data: {
                    type: 'Simple',
                    name: name,
                    email: email,
                    contact_number: number,
                    city_id: city_id,
                    address: address,
                    description: description,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#overlay").hide('slow');
                    if (response.state == 'warning') {
                        toastr.warning(response.message);    
                    }else{
                        toastr.success(response.message);
                        window.location.href = '/user/profile';
                    }
                },
                error: function(xhr, status, error) {
                    $("#overlay").hide('slow');
                    if(xhr.status === 401) {
                        toastr.warning('Please login first to place order.');
                    } else {
                        toastr.error('Error place order.');
                    }
                }
            });
        }
    });
    $('#orderTable').on('click', '.cancelOrder', function(e) {
        e.preventDefault();
        var orderId = $(this).data('order-id');
        $("#overlay").show('slow');
        $.ajax({
            url: '/order/cancel',
            type: 'POST',
            data: {
                id: orderId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("#overlay").hide('slow');
                if (response.state == 'warning') {
                    toastr.warning(response.message);    
                }else{
                    toastr.success(response.message);
                    $('#orderTableBody').html(response.data);
                }
            },
            error: function(xhr, status, error) {
                $("#overlay").hide('slow');
                if(xhr.status === 401) {
                    toastr.warning('Please login first to cancel order.');
                } else {
                    toastr.error('Error in cancel order.');
                }
            }
        });
    });
    $('#orderTable').on('click', '.deleteOrder', function(e) {
        e.preventDefault();
        var orderId = $(this).data('order-id');
        $("#overlay").show('slow');
        $.ajax({
            url: '/order/delete',
            type: 'POST',
            data: {
                id: orderId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("#overlay").hide('slow');
                if (response.state == 'warning') {
                    toastr.warning(response.message);    
                }else{
                    toastr.success(response.message);
                    $('#orderTableBody').html(response.data);
                }
            },
            error: function(xhr, status, error) {
                $("#overlay").hide('slow');
                if(xhr.status === 401) {
                    toastr.warning('Please login first to delete order.');
                } else {
                    toastr.error('Error in delete order.');
                }
            }
        });
    });
    $('#updateProfile').on('submit', function(e) {
        e.preventDefault();
        $("#overlay").show('slow');
        var formData = new FormData(this);
        $.ajax({
            url: '/user/update',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $("#overlay").hide('slow');
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                $("#overlay").hide('slow');
                if(xhr.status === 401) {
                    toastr.warning('Please login first to update profile.');
                } else {
                    toastr.error('Error updating user profile!');
                }
            }
        });
    });
    $('.addToCart').on('click', function(e) {
        $("#overlay").show('slow');
        e.preventDefault();
        var productId      = $(this).data('product-id');
        var radioPrice     = $('.wrapper input[type="radio"][name="price_id"]:checked').val();
        var ancherPrice    = $(this).data('price-id');
        var priceId        = ancherPrice ? ancherPrice : radioPrice;
        var quantity       = $('#quantity-input').val() ? $('#quantity-input').val() : 1;
        $.ajax({
            url: '/cart/store',
            type: 'POST',
            data: {
                product_id: productId,
                price_id: priceId,
                quantity: quantity,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("#overlay").hide('slow');
                if (response.state == 'warning') {
                    toastr.warning(response.message);    
                }else{
                    updateCartWidget(response.cartData);
                    toastr.success(response.message);
                }
            },
            error: function(xhr, status, error) {
                $("#overlay").hide('slow');
                if(xhr.status === 401) {
                    toastr.warning('Please login first to add items to the cart.');
                } else {
                    toastr.error('Error adding product to cart');
                }
            }
        });
    });
    $('#cartTable').on('click', '.removeFromCart', function(e) {
        e.preventDefault();
        $("#overlay").show('slow');
        var id = $(this).data('id');
        deleteCartItem(id);
    });
    $('#cartItems').on('click', '.removeFromCart', function(e) {
        e.preventDefault();
        $("#overlay").show('slow');
        var id = $(this).data('id');
        deleteCartItem(id);
    });
     $('#cartTableBody').on('click', '.update_cart', function(e) {
        e.preventDefault();
        $("#overlay").show('slow');
        var selectedItems = [];
        $('.item-quantity').each(function() {
            var itemId = $(this).attr('name').split('-')[1];
            var quantity = $(this).val();
            var selectedPriceRadio = $('input[name="price-' + itemId + '"]:checked');

            if (selectedPriceRadio.length) {
                var priceId = selectedPriceRadio.data('price-id');
                selectedItems.push({ itemId: itemId, priceId: priceId, quantity: quantity });
            }
        });
        $.ajax({
            url: '/cart/update',
            type: 'POST',
            data: {
                data: JSON.stringify(selectedItems),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                updateCartWidget(response.cartData);
                $("#overlay").hide('slow');
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                $("#overlay").hide('slow');
                if(xhr.status === 401) {
                    toastr.warning('Please login first to update cart.');
                } else {
                    toastr.error('Error updating product from cart.');
                }
            }
        });
    });
    $('.add-to-wishlist').on('click', function(e) {
        $("#overlay").show('slow');
        e.preventDefault();
        var id = $(this).data('product-id');
        $.ajax({
            url: '/wishlist/store',
            type: 'POST',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("#overlay").hide('slow');
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                $("#overlay").hide('slow');
                if(xhr.status === 401) {
                    toastr.warning('Please login first to add items to the wishlist.');
                } else {
                    toastr.error('Error adding product to wishlist!');
                }
            }
        });
    });
    $('.remove-from-wishlist').on('click', function(e) {
        $("#overlay").show('slow');
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '/wishlist/delete',
            type: 'POST',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("#overlay").hide('slow');
                $('#wishlistItem' + id).remove();
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                $("#overlay").hide('slow');
                if(xhr.status === 401) {
                    toastr.warning('Please login first to remove item from wishlist.');
                } else {
                    toastr.error('Error remove items from wishlist!');
                }
            }
        });
    });
    function deleteCartItem(id) {
        $.ajax({
            url: '/cart/delete',
            type: 'POST',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                updateCartWidget(response.cartData);
                $("#overlay").hide('slow');
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                $("#overlay").hide('slow');
                if(xhr.status === 401) {
                    toastr.warning('Please login first to remove items from cart.');
                } else {
                    toastr.error('Error removing product from cart.');
                }
            }
        });
    }
    function updateCartWidget(cartData) {
        $('.cart-count-badge').text(cartData.count);
        $('.amount .currencySymbol').html('&#8360; ' + cartData.amount);
        var shippingChargesString = $('#shiping_charges').data('shippingCharges');
        var subTotal = parseInt(cartData.amount) || 0;
        var shippingCost = parseInt(shippingChargesString, 10) || 0;
        $('.cart-items').html(cartData.dropdownHtml);
        $('#cartTableBody').html(cartData.tableHtml);
        $('.cart-summary-wrap .sub-total').html('&#8360; '+subTotal);
        $('.cart-summary-wrap .grand-total').html('&#8360; '+(subTotal + shippingCost));
    }
});
