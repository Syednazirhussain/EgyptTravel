<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Price
 * @package App\Models
 * @version October 8, 2018, 6:08 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string title
 * @property string label
 * @property string price
 */
class Price extends Model
{
    use SoftDeletes;

    public $table = 'price';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'label',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'label' => 'string',
        'price' => 'string'
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
    public function package()
    {
        return $this->hasMany(\App\Models\Package::class);
    }

    
}
