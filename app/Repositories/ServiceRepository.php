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


    /**
     * Override pagination method
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $columns = ['*'], $with = [])
    {
        $query = $this->allQuery()->with(...$with);

        return $query->paginate($perPage, $columns);
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance(\collect($input)->except(['city_id', 'categories'])->toArray());

        $model->city()->associate($input['city_id']);

        $model->provider_id = 1; // Change this to auth()->user()->id when you implement auth

        $model->save();

        if (isset($input['categories']))
            $model->categories()->sync($input['categories']);

        return $model;
    }

    /**
     * Override update method
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill(\collect($input)->except(['categories'])->toArray());


        if (isset($input['categories']))
            $model->categories()->sync($input['categories']);

        $model->push();

        return $model;
    }
}