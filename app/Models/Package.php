<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Package
 * @package App\Models
 * @version October 5, 2018, 12:37 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string feature_image
 * @property string title
 * @property integer category_id
 * @property string description
 * @property string discount
 * @property string covering_sight
 * @property integer day
 * @property integer night
 * @property integer accomodation_id
 * @property string|\Carbon\Carbon traveling_date
 * @property string important_notes
 */
class Package extends Model
{
    use SoftDeletes;

    public $table = 'package';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'feature_image',
        'title',
        'category_id',
        'description',
        'discount',
        'covering_sight',
        'price_id',
        'day',
        'night',
        'accomodation_id',
        'traveling_date',
        'important_notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'feature_image' => 'string',
        'title' => 'string',
        'category_id' => 'integer',
        'price_id' => 'integer',
        'description' => 'string',
        'discount' => 'string',
        'covering_sight' => 'string',
        'day' => 'integer',
        'night' => 'integer',
        'accomodation_id' => 'integer',
        'important_notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function prices()
    {
        return $this->belongsTo(\App\Models\Price::class,'price_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function accomodation()
    {
        return $this->belongsTo(\App\Models\Accomodation::class,'accomodation_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Price::class,'price_id','id');
    }

    
}
