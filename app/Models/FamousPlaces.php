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
        'image'
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
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
