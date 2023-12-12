<?php

namespace App\ModelFilters;

use Illuminate\Database\Eloquent\Builder;

trait SubCategoriesFilter
{
    /**
     * This is a sample custom query
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param                                       $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function filterCustomSearch_like(Builder $builder, $value)
    {
        return $builder->where('name', 'like', '%'.$value.'%');
    }
}
