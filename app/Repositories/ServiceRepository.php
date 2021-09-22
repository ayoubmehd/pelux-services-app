<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\BaseRepository;

/**
 * Class ServiceRepository
 * @package App\Repositories
 * @version September 22, 2021, 3:16 pm UTC
*/

class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'lat',
        'long',
        'city_id',
        'provider_id',
        'is_publised'
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
        return Service::class;
    }
}
