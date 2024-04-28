<?php


use App\Models\Product;
use App\Models\Setting;
use Spatie\Image\Image;
use App\Models\Category;
use App\Models\ProductPrice;
use Spatie\Image\Manipulations;

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function uploadFile($file, $path, $width = null, $height = null)
{
    $extension = $file->getClientOriginalExtension();
    $name = uniqid().".".$extension;

    $folder = 'images/'.$path;
    $finalPath = $folder.'/'.$name;
    $file->move($folder, $name);
    if ($width && $height) {
        Image::load($finalPath)->fit(Manipulations::FIT_CROP, $width, $height)->save(public_path($finalPath));
    }
    return $finalPath;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function settings($key)
{
    return Setting::get($key);
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function getFilter($collection, $filterables)
{
    foreach($filterables as $filterable)
    {
        $filters[$filterable] = $collection->whereNotNull($filterable)->where($filterable, '!=', 0)->unique($filterable);
    }
    return $filters;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function categoriesList()
{
    return Category::all();
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function cart()
{
    $amount = 0;
    $count = 0;
    $tableHtml  = '';
    $dropdownHtml = '<ul class="cart-items">';
    $cart = session()->get('cart', []);
    if (count($cart) > 0) {
        foreach($cart as $key => $row){
            $product = Product::find($key);
            $productPrice = ProductPrice::find($row['price_id']);
            $amount = $amount + ($row['quantity'] * $productPrice->new_price);
            // Table HTML
            $tableHtml  .=
            '<tr id="itemRow'. $key .'">
                <td class="pro-remove">
                    <a href="javascript:void(0)" class="removeFromCart" data-id="' . $key . '">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
                <td class="pro-thumbnail">
                    <a href="' . route('product.show', $key) . '">
                        <img src="' . $product->thumbnail . '" alt="Product">
                    </a>
                </td>
                <td class="pro-title">
                    <a href="' . route('product.show', $key).'">'. Str::limit($product->name, 50).'</a>
                </td>
                <td class="pro-price">';
                    foreach($product->prices as $price){
                        if($price->id == $row['price_id']){
                            $check = 'checked';
                        }else{
                            $check = '';
                        }
                        $tableHtml .='<div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="price-'.$key.'"
                                data-price-id="'.$price->id .'"
                                id="price'.$price->id.'"'.$check.'
                                >
                            <label class="form-check-label" for="price'.$price->id.'">
                                <span>&#8360; '.$price->new_price.' ('.$price->title.' )</span>
                            </label>
                        </div>';
                    }
                $tableHtml  .='</td>
                <td class="pro-price"><span>&#8360; '.$productPrice->new_price.'</span></td>
                <td class="pro-quantity">
                    <div class="pro-qty">
                        <div class="count-input-block">
                            <input
                                type="number" class="form-control text-center item-quantity"
                                name="quantity-' . $key . '"
                                value="' . $row['quantity'] . '"
                                min="1">
                        </div>
                    </div>
                </td>
                <td class="pro-subtotal">
                    <span>&#8360; '. ($productPrice->new_price * $row['quantity']).'</span>
                </td>
            </tr>';
            // Table HTML

            // Dropdown HTML
            $dropdownHtml .=
            '<li class="single-cart">
                <a href="' . route('product.show', $key) . '" class="cart-product">
                    <div class="cart-product-img">
                        <img src="'. $product->thumbnail.'" alt="Selected Products">
                    </div>
                    <div class="product-details">
                        <h4 class="product-details--title">'.$product->name.'</h4>
                        <span class="product-details--price">'.$row['quantity'].' x &#8360; '.$productPrice->new_price.'</span>
                    </div>
                    <button type="submit" class="link removeFromCart" data-id="'.$key.'">
                        <span class="cart-cross">x</span>
                    </button>
                </a>
            </li>';
        }
        $tableHtml  .='
        <tr>
            <td colspan="7" class="actions">
                <div class="update-block text-end">
                    <input type="button" class="btn-black update_cart" value="Update cart">
                </div>
            </td>
        </tr>';
        $count = count($cart);
    } else {
        $tableHtml .= '<tr><td colspan="7" class="text-center">No items found</td></tr>';
        $dropdownHtml .= '<li class="single-cart">No items found in the cart</li>';
    }

    // Add subtotal and cart buttons to dropdown HTML
    $dropdownHtml .=
    '<li class="single-cart">
        <div class="cart-product__subtotal">
            <span class="subtotal--title">Total</span>
            <span class="subtotal--price">&#8360; ' . $amount . '</span>
        </div>
    </li>
    <li class="single-cart">
        <div class="cart-buttons">
            <a href="'. route('cart.index') .'" class="btn btn-outlined">View Cart</a>
            <a href="'. route('checkout').'" class="btn btn-outlined">Check Out</a>
        </div>
    </li>';
    return [
        'count'       => $count,
        'amount'      => $amount,
        'tableHtml'   => $tableHtml,
        'dropdownHtml'=> $dropdownHtml
    ];
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function orders()
{
    $tableHtml = '';
    $orders = auth()->user()->orders()->whereUserState('Show')->get();
    if (count($orders) > 0) {
        foreach($orders as $key => $order){
            $tableHtml .='<tr>
                <td>'.++$key.'</td>
                <td>'.$order->name.'</td>
                <td>'.date('M d Y', $order->created_at->timestamp).'</td>
                <td>'.$order->status.'</td>
                <td>&#8360; '.$order->totalAmount+$order->shipping_cost.'</td>
                <td>';
                    if($order->status == 'Pending'){
                        $tableHtml .='<a href="javascript:void(0)" class="cancelOrder" data-order-id="'.$order->id.'">Cancel</a>';
                    }
                    if($order->status == 'Cancelled' || $order->status == 'Completed'){
                        $tableHtml .='<a href="javascript:void(0)" class="deleteOrder" data-order-id="'.$order->id.'">Delete</a>';
                    }
                $tableHtml .='</td>
            </tr>';
        }
    }else{
        $tableHtml .= '<tr><td colspan="6" class="text-center">No order found</td></tr>';
    }
    return $tableHtml;
}
