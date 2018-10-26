<?php

namespace App\Repositories;

use App\Models\FamousPlaces;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FamousPlacesRepository
 * @package App\Repositories
 * @version October 4, 2018, 12:37 pm UTC
 *
 * @method FamousPlaces findWithoutFail($id, $columns = ['*'])
 * @method FamousPlaces find($id, $columns = ['*'])
 * @method FamousPlaces first($columns = ['*'])
*/
class FamousPlacesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FamousPlaces::class;
    }
}
