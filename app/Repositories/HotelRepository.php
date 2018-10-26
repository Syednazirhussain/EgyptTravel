<?php

namespace App\Repositories;

use App\Models\Hotel;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HotelRepository
 * @package App\Repositories
 * @version October 9, 2018, 7:48 am UTC
 *
 * @method Hotel findWithoutFail($id, $columns = ['*'])
 * @method Hotel find($id, $columns = ['*'])
 * @method Hotel first($columns = ['*'])
*/
class HotelRepository extends BaseRepository
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
        return Hotel::class;
    }
}
