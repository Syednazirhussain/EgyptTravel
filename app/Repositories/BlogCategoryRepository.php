<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories
 * @version November 5, 2018, 6:20 am UTC
 *
 * @method BlogCategory findWithoutFail($id, $columns = ['*'])
 * @method BlogCategory find($id, $columns = ['*'])
 * @method BlogCategory first($columns = ['*'])
*/
class BlogCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BlogCategory::class;
    }
}
