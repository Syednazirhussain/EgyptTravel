<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class WebSetting
 * @package App\Models
 * @version October 13, 2018, 8:10 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string title
 * @property string logo
 * @property string footer_text
 * @property string facebook_link
 * @property string twitter_link
 * @property string instagram_link
 * @property string google_plus_link
 */
class WebSetting extends Model
{
    use SoftDeletes;

    public $table = 'web_settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'sub_title',
        'code',
        'logo',
        'footer_text',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'google_plus_link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'sub_title' => 'string',
        'code' => 'string',
        'logo' => 'string',
        'footer_text' => 'string',
        'facebook_link' => 'string',
        'twitter_link' => 'string',
        'instagram_link' => 'string',
        'google_plus_link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
