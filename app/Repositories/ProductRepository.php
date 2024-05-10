<?php

namespace App\Repositories;
use App\Contracts\ProductInterface;
use App\Models\{Product};

class ProductRepository implements ProductInterface
{
    public function list($filter = [], $type = null, $pagination = false)
    {
        $query = Product::query();
        $relations = ['brand', 'category', 'subCategory', 'composition', 'prices', 'images'];
        if(!is_null($type)){
            $query->special($type);
        }
        $query->filter($filter)->with($relations);
        return $pagination ? $query->paginate() : $query->get();
    }
}
