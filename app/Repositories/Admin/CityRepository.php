<?php

namespace App\Repositories\Admin;

use App\Models\Admin\City;
use App\Repositories\BaseRepository;

/**
 * Class CityRepository
 * @package App\Repositories\Admin
 * @version September 22, 2021, 2:02 pm UTC
*/

class CityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'label'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return City::class;
    }
}
