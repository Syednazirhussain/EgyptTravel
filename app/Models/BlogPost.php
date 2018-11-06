<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogPost
 * @package App\Models
 * @version November 5, 2018, 6:49 am UTC
 *
 * @property \App\Models\BlogCategory blogCategory
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string title
 * @property string description
 * @property string image
 * @property integer blog_cat_id
 * @property string tags
 * @property string status
 */
class BlogPost extends Model
{
    use SoftDeletes;

    public $table = 'blog_posts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'image',
        'blog_cat_id',
        'tags',
        'status'
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
        'image' => 'string',
        'blog_cat_id' => 'integer',
        'tags' => 'string',
        'status' => 'string'
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
    public function blogCategory()
    {
        return $this->belongsTo(\App\Models\BlogCategory::class);
    }
}
