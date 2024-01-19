<?php

namespace App\Models;

use App\ModelFilters\UsersFilter;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'city_id',
        'address',
        'contact_number',
        'image'
    ];

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
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

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