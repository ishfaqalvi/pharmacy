<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Customer
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $phone_number
 * @property $email_verified_at
 * @property $password
 * @property $city_id
 * @property $address
 * @property $contact_number
 * @property $image
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Customer extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens, HasFactory;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','phone_number','city_id','address','contact_number','image'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setImageAttribute($image)
    {
        if ($image) {
            $this->attributes['image'] = uploadFile($image, 'profile', '150', '150');
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
        return asset($image);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartProducts()
    {
        return $this->hasMany('App\Models\Cart', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishProducts()
    {
        return $this->hasMany('App\Models\Wishlist', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'user_id', 'id');
    }

    /**
     * Count the pending orders
     */
    public function pendingOrder()
    {
        return $this->orders()->whereStatus('Pending')->count();
    }

    /**
     * Count the processed orders
     */
    public function processedOrder()
    {
        return $this->orders()->whereIn('Status',['Received','Shipped'])->count();
    }

    /**
     * Get the latest order date
     */
    public function latestOrderDate()
    {
        $order = $this->orders()->latest()->first();
        return $date = $order ? 'Latest order:'. $order->create_at : 'No order submitted.';
    }

    /**
     * Get the cart amount
     */
    public function cartAmount()
    {
        return $this->cartProducts->sum(function ($product) {
            return $product->quantity * $product->price->new_price;
        });
    }
}
