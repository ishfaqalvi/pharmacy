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
    $items = 0;
    $total = 0;
    $products = [];
    if (auth()->user()) {
        foreach(auth()->user()->cartProducts as $row){
            $price = ProductPrice::find($row->price_id);
            $total = $total + ($row->quantity * $price->new_price);
            $items = $items + 1;
            $products[] = $row;
        }
    }
    $data = ['itmes' => $items, 'total' => $total, 'products' => $products];
    return $data;
}