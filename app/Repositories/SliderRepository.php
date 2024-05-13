<?php

namespace App\Repositories;
use App\Contracts\SliderInterface;
use App\Models\{Slider,Brand,Category,SubCategory,Product};

class SliderRepository implements SliderInterface
{
    public function list($pagination = false, $orderby = false)
    {
        $query = Slider::query();
        if($orderby){
            $query->orderBy('order');
        }
        return $pagination ? $query->paginate() : $query->get();
    }

    public function new()
    {
        return new Slider();
    }

    public function store($data)
    {
        return Slider::create($data);
    }

    public function find($id)
    {
        return Slider::find($id);
    }

	public function update($data, $id)
    {
        return Slider::find($id)->update($data);
    }

	public function delete($id)
    {
        return Slider::find($id)->delete();
    }

    public function checkParent($data)
    {
        if($data['type'] == 'Brand'){
            $parent = Brand::where('name',$data['parent'])->first();
        }elseif($data['type'] == 'Category'){
            $parent = Category::where('name',$data['parent'])->first();
        }elseif($data['type'] == 'Sub Category'){
            $parent = SubCategory::where('name',$data['parent'])->first();
        }elseif($data['type'] == 'Product'){
            $parent = Product::where('name',$data['parent'])->first();
        }else{
            $parent = true;
        }
        return $parent;
    }
}
