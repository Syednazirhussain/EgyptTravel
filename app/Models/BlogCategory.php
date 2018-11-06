<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @package App\Models
 * @version November 5, 2018, 6:20 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection BlogPost
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string name
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    public $table = 'famous_place_category';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image' => 'string'
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
    public function famousPlaces()
    {
        return $this->hasMany(\App\Models\FamousPlaces::class);
    }
}
