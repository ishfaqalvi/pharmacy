<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ModelFilters\CategoriesFilter;

/**
 * Class Category
 *
 * @property $id
 * @property $name
 * @property $logo
 * @property $description
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use SoftDeletes, CategoriesFilter, Filterable;


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
    protected $fillable = ['name','logo'];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setLogoAttribute($image)
    {
        if ($image) {
            $this->attributes['logo'] = uploadFile($image, 'category', '165', '165');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub()
    {
        return $this->hasMany('App\Models\SubCategory', 'category_id', 'id');
    }
}