<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FamousPlaces
 * @package App\Models
 * @version October 4, 2018, 12:37 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string title
 * @property string description
 * @property string image
 */
class FamousPlaces extends Model
{
    use SoftDeletes;

    public $table = 'famous_places';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'image',
        'tags',
        'famous_place_cat_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'tags' => 'string',
        'image' => 'string',
        'famous_place_cat_id' => 'integer'
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
    public function placeCategory()
    {
        return $this->belongsTo(\App\Models\BlogCategory::class);
    }

    
}
