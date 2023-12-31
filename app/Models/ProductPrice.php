<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class ProductPrice
 *
 * @property $id
 * @property $product_id
 * @property $title
 * @property $price
 * @property $discount
 * @property $default
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductPrice extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id','title','old_price','new_price','discount','default'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($price) {
            $price->old_price = $price->new_price;
        });

        static::updating(function ($price) {
            $price->old_price = $price->getOriginal('new_price');
        });
    }

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setDiscountAttribute($value)
    {
        $this->attributes['discount'] = empty($value) ? 0 : $value;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
