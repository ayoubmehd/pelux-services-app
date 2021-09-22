<?php

namespace App\Repositories;

use App\Models\Adress;
use App\Repositories\BaseRepository;

/**
 * Class AdressRepository
 * @package App\Repositories
 * @version September 22, 2021, 3:07 pm UTC
*/

class AdressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ligne1',
        'ligne2',
        'city_id'
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
        return Adress::class;
    }
}
