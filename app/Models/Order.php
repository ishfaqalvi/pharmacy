<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Order
 *
 * @property $id
 * @property $user_id
 * @property $city_id
 * @property $address
 * @property $contact_number
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property City $city
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'city_id',
        'order_number',
        'name',
        'email',
        'address',
        'contact_number',
        'shipping_cost',
        'image',
        'description',
        'type',
        'admin_state',
        'user_state',
        'status'
    ];

    /**
     * Attributes that should auto genereted.
     *
     * @var array
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($order) { 
            $order->order_number = 'IN-' . str_pad($order->id, 6, "0", STR_PAD_LEFT);
            $shipping_charges    = settings('shiping_charges');
            $order->shipping_cost= isset($shipping_charges) ? intval($shipping_charges) : 200;
            $order->save();
        });
    }

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setImageAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['image'] = uploadFile($image, 'order', '500', '800');
        } else {
            unset($this->attributes['image']);
        }
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getImageAttribute($image)
    {
        if($image){ return asset($image); }
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getTotalAmountAttribute()
    {
        return $this->details->sum(function ($product) {
            return $product->price * $product->quantity;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id', 'id');
    }
}
