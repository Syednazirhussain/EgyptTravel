<?php

namespace App\Repositories;

use App\Models\BlogPost;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BlogPostRepository
 * @package App\Repositories
 * @version November 5, 2018, 6:49 am UTC
 *
 * @method BlogPost findWithoutFail($id, $columns = ['*'])
 * @method BlogPost find($id, $columns = ['*'])
 * @method BlogPost first($columns = ['*'])
*/
class BlogPostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'image',
        'blog_cat_id',
        'tags',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BlogPost::class;
    }
}
