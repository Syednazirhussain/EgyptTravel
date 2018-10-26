<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version October 12, 2018, 5:26 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Package
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string name
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'category';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name','code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
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
