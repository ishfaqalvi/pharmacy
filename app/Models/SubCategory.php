<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ModelFilters\SubCategoriesFilter;

/**
 * Class SubCategory
 *
 * @property $id
 * @property $category_id
 * @property $name
 * @property $logo
 * @property $description
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SubCategory extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use SoftDeletes, SubCategoriesFilter, Filterable;


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->perPage = settings('per_page_items') ?: 15;
    }

    /**
     * Columns that should be filterable.
     *
     * @var array
     */
    private static $whiteListFilter = ['category_id'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id','name'];

    /**
     * Attributes that should be filterable.
     *
     * @var array
     */
    public static function filterAttribute()
    {
        return getFilter(self::get(), ['category_id']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}