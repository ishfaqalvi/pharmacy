<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    use SoftDeletes;


    protected $perPage = 20; 

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','logo','website'];

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
}