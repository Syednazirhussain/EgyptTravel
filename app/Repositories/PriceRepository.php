<?php

namespace App\Repositories;

use App\Models\Price;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PriceRepository
 * @package App\Repositories
 * @version October 8, 2018, 6:08 am UTC
 *
 * @method Price findWithoutFail($id, $columns = ['*'])
 * @method Price find($id, $columns = ['*'])
 * @method Price first($columns = ['*'])
*/
class PriceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'label',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Price::class;
    }
}
