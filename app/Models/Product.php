<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\ModelFilters\ProductsFilter;

/**
 * Class Product
 *
 * @property $id
 * @property $brand_id
 * @property $category_id
 * @property $sub_category_id
 * @property $type
 * @property $name
 * @property $formula
 * @property $description
 * @property $thumbnail
 * @property $quantity
 * @property $rating
 * @property $in_stock
 * @property $created_at
 * @property $updated_at
 *
 * @property Brand $brand
 * @property Category $category
 * @property ProductImage[] $productImages
 * @property ProductPrice[] $productPrices
 * @property SubCategory $subCategory
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use ProductsFilter, Filterable;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->perPage = settings('per_page_items') ?: 15;
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id',
        'category_id',
        'sub_category_id',
        'name',
        'formula',
        'description',
        'thumbnail',
        'quantity',
        'rating',
        'in_stock'
    ];

    /**
     * Columns that should be filterable.
     *
     * @var array
     */
    private static $whiteListFilter = ['brand_id','category_id','sub_category_id'];

    /**
     * Attributes that should be filterable.
     *
     * @var array
     */
    public static function filterAttribute($type = null)
    {
        $collection = $type == null ? self::get() : self::special($type)->get();
        return getFilter($collection, ['brand_id','category_id','sub_category_id']);
    }

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setThumbnailAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['thumbnail'] = uploadFile($image, 'product', '100', '100');
        } elseif (is_string($image)) {
            $this->attributes['thumbnail'] = $image;
        } else {
            unset($this->attributes['thumbnail']);
        }
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getThumbnailAttribute($image)
    {
        if($image){ return asset($image); }
    }

    /**
     * Scope a query to only include products of a given category.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSpecial($query, $type)
    {
        return $query->whereHas('categorizations', function ($query) use ($type) {
            $query->where('type', $type);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne('App\Models\Brand', 'id', 'brand_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subCategory()
    {
        return $this->hasOne('App\Models\SubCategory', 'id', 'sub_category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage', 'product_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany('App\Models\ProductPrice', 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categorizations()
    {
        return $this->hasMany('App\Models\ProductCategorized', 'product_id', 'id');
    }
}
