<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Slider
 *
 * @property $id
 * @property $image
 * @property $type
 * @property $type_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Slider extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','image','type','type_id','order'];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setImageAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['image'] = uploadFile($image, 'slider', '1920', '570');
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
     * The set attributes.
     *
     * @var array
     */
    public function setTypeIdAttribute($value)
    {
        if($this->type == 'Brand')
        {
            $this->attributes['type_id'] = Brand::where('name',$value)->first()->id;
        }
        elseif($this->type == 'Category')
        {
            $this->attributes['type_id'] = Category::where('name',$value)->first()->id;
        }
        elseif($this->type == 'Sub Category')
        {
            $this->attributes['type_id'] = SubCategory::where('name',$value)->first()->id;
        }
        elseif($this->type == 'Product')
        {
            $this->attributes['type_id'] = Product::where('name',$value)->first()->id;
        }
        else
        {
            unset($this->attributes['image']);
        }
    }

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setOrderAttribute($value)
    {
        $this->attributes['order'] = empty($value) ? 1 : $value;
    }
}
