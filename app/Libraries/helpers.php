<?php


use App\Models\Setting;
use App\Models\Category;
use App\Models\ProductPrice;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function uploadFile($file, $path, $width, $height)
{
    $extension = $file->getClientOriginalExtension();
    $name = uniqid().".".$extension;
 
    $folder = 'images/'.$path;
    $finalPath = $folder.'/'.$name;
    $file->move($folder, $name);

    Image::load($finalPath)->fit(Manipulations::FIT_CROP, $width, $height)->save(public_path($finalPath));
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
    if (auth()->user() && auth()->user()->cartProducts->isNotEmpty()) {
        foreach(auth()->user()->cartProducts as $row){
            $product = $row->product;
            $amount = $amount + ($row->quantity * $row->price->new_price);
            // Table HTML
            $tableHtml  .= 
            '<tr id="itemRow'. $row->id .'">
                <td class="pro-remove">
                    <a href="javascript:void(0)" class="removeFromCart" data-id="' . $row->id . '">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
                <td class="pro-thumbnail">
                    <a href="' . route('product.show', $row->product_id) . '">
                        <img src="' . $product->thumbnail . '" alt="Product">
                    </a>
                </td>
                <td class="pro-title">
                    <a href="' . route('product.show', $row->product_id).'">'. Str::limit($product->name, 50).'</a>
                </td>
                <td class="pro-price">';
                    foreach($product->prices as $price){
                        if($price->id == $row->price_id){
                            $check = 'checked';
                        }else{
                            $check = '';
                        }
                        $tableHtml .='<div class="form-check">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="price-'.$row->id.'"
                                data-price-id="'.$price->id .'" 
                                id="price'.$price->id.'"'.$check.'
                                >
                            <label class="form-check-label" for="price'.$price->id.'">
                                <span>&#8360; '.$price->new_price.' ('.$price->title.' )</span>
                            </label>
                        </div>';
                    }
                $tableHtml  .='</td>
                <td class="pro-price"><span>&#8360; '.$row->price->new_price.'</span></td>
                <td class="pro-quantity">
                    <div class="pro-qty">
                        <div class="count-input-block">
                            <input 
                                type="number" class="form-control text-center item-quantity" 
                                name="quantity-' . $row->id . '" 
                                value="' . $row->quantity . '" 
                                min="1">
                        </div>
                    </div>
                </td>
                <td class="pro-subtotal">
                    <span>&#8360; '. ($row->price->new_price * $row->quantity).'</span>
                </td>
            </tr>';
            // Table HTML

            // Dropdown HTML
            $dropdownHtml .= 
            '<li class="single-cart">
                <a href="' . route('product.show', $row->product_id) . '" class="cart-product">
                    <div class="cart-product-img">
                        <img src="'. $product->thumbnail.'" alt="Selected Products">
                    </div>
                    <div class="product-details">
                        <h4 class="product-details--title">'.$product->name.'</h4>
                        <span class="product-details--price">'.$row->quantity.' x &#8360; '.$row->price->new_price.'</span>
                    </div>
                    <button type="submit" class="link removeFromCart" data-id="'.$row->id.'">
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
        $count = count(auth()->user()->cartProducts);
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