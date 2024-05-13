<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Image\Manipulations;
use Spatie\Image\Image;

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

    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->perPage = settings('per_page_items') ? : 15;
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','heading','sub_heading','image','type','type_id','order'];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setImageAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['image'] = uploadFile($image, 'slider/', '1000', '391');
        } else {
            unset($this->attributes['image']);
        }
    }
    // public function setImageAttribute($image)
    // {
    //     if ($image instanceof \Illuminate\Http\UploadedFile) {
    //         $extension = $image->getClientOriginalExtension();
    //         $name = uniqid() . "." . $extension;
    //         $originalPath = public_path('images/slider/');
    //         $image->move($originalPath.'original', $name);

    //         Image::load($originalPath.'original/'.$name)
    //             ->fit(Manipulations::FIT_CROP, 1920, 570)
    //             ->save($originalPath .'large/'.$name);

    //         Image::load($originalPath.'original/'.$name)
    //             ->fit(Manipulations::FIT_CROP, 500, 300)
    //             ->save($originalPath.'small/'.$name);

    //         $this->attributes['image'] = $name;
    //     } else {
    //         unset($this->attributes['image']);
    //     }
    // }

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

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getImageAttribute($image)
    {
        return isset($image) ? asset($image) : null;
    }
}
