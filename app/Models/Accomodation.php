<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Accomodation
 * @package App\Models
 * @version October 8, 2018, 10:49 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Package
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string name
 * @property string address
 * @property string description
 * @property string gallery_images
 * @property string url_link
 */
class Accomodation extends Model
{
    use SoftDeletes;

    public $table = 'acommodation';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'address',
        'description',
        'gallery_images',
        'url_link',
        'recommended'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'description' => 'string',
        'gallery_images' => 'string',
        'url_link' => 'string',
        'recommended'  => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function packages()
    {
        return $this->hasMany(\App\Models\Package::class);
    }
}
