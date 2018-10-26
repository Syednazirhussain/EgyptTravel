<?php

namespace App\Repositories;

use App\Models\WebSetting;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WebSettingRepository
 * @package App\Repositories
 * @version October 13, 2018, 8:10 am UTC
 *
 * @method WebSetting findWithoutFail($id, $columns = ['*'])
 * @method WebSetting find($id, $columns = ['*'])
 * @method WebSetting first($columns = ['*'])
*/
class WebSettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'logo',
        'footer_text',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'google_plus_link'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return WebSetting::class;
    }
}
