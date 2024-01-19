<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class OrderDetail
 *
 * @property $id
 * @property $order_id
 * @property $product_id
 * @property $price
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 *
 * @property Order $order
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderDetail extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','product_id','price_id','price','quantity'];

    /**
     * Calculate the amount attribute.
     */
    public function getAmountAttribute()
    {
        return $this->quantity * $this->price;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productPrice()
    {
        return $this->hasOne('App\Models\ProductPrice', 'id', 'price_id');
    }
}
