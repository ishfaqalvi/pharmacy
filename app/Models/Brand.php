<?php

namespace App\Models;


use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ModelFilters\BrandsFilter;

/**
 * Class Brand
 *
 * @property $id
 * @property $name
 * @property $logo
 * @property $description
 * @property $website
 * @property $email
 * @property $phone
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Brand extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use SoftDeletes, BrandsFilter, Filterable;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->perPage = settings('per_page_items') ? : 15;
    }

    /**
     * Columns that should be filterable.
     *
     * @var array
     */
    private static $whiteListFilter = ['popular'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','logo','website','popular'];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setLogoAttribute($image)
    {
        if ($image) {
            $this->attributes['logo'] = uploadFile($image, 'brand', '168', '86');
        } else {
            unset($this->attributes['logo']);
        }
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getLogoAttribute($value)
    {
        return isset($value) ? asset($value) : '';
    }

    /**
     * Scope a query to only include products of a given category.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopular($query)
    {
        return $query->where('popular', 'Yes');
    }
}