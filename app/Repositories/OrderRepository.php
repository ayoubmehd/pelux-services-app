<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\BaseRepository;

/**
 * Class OrderRepository
 * @package App\Repositories
 * @version September 22, 2021, 3:24 pm UTC
 */

class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'service_id',
        'user_id'
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
        return Order::class;
    }

    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'], $with = [], $withCount = [])
    {
        $query = $this->model->newQuery();

        return $query->with($with)->withCount($withCount)->find($id, $columns);
    }
}