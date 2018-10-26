<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Booking
 * @package App\Models
 * @version October 9, 2018, 7:49 am UTC
 *
 * @property \App\Models\Package package
 * @property \App\Models\Hotel hotel
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property integer package_id
 * @property date start_date
 * @property date end_date
 * @property integer hotel_id
 * @property string room_code
 * @property string email
 * @property string name
 * @property string additional_info
 */
class Booking extends Model
{
    use SoftDeletes;

    public $table = 'bookings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'package_id',
        'start_date',
        'end_date',
        'hotel_id',
        'room_code',
        'email',
        'name',
        'additional_info'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'package_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'hotel_id' => 'integer',
        'room_code' => 'string',
        'email' => 'string',
        'name' => 'string',
        'additional_info' => 'string'
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
    public function package()
    {
        return $this->belongsTo(\App\Models\Package::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function hotel()
    {
        return $this->belongsTo(\App\Models\Hotel::class);
    }
}
