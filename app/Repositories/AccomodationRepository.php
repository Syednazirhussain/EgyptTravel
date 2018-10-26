<?php

namespace App\Repositories;

use App\Models\Accomodation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AccomodationRepository
 * @package App\Repositories
 * @version October 8, 2018, 10:49 am UTC
 *
 * @method Accomodation findWithoutFail($id, $columns = ['*'])
 * @method Accomodation find($id, $columns = ['*'])
 * @method Accomodation first($columns = ['*'])
*/
class AccomodationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'description',
        'gallery_images',
        'url_link'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Accomodation::class;
    }
}
