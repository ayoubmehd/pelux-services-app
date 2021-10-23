<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Str;

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

        $data = $query->with($with)->withCount($withCount)->find($id, $columns);

        return $data;
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

        $input['excerpt'] = Str::limit(\strip_tags($input['description']), 200, '...');

        $model = $this->model->newInstance(\collect($input)->except(['city_id', 'categories'])->toArray());

        $model->city()->associate($input['city_id']);

        $model->category()->associate($input['category']);

        $model->provider_id = auth()->user()->id; // Change this to auth()->user()->id when you implement auth

        $model->save();

        $newTagsIds = \collect($model->keywords()->createMany($input['newTags']))->map(function ($tag) {
            return $tag['id'];
        })->toArray();

        $model->keywords()->sync(\array_merge($input['existingTags'], $newTagsIds));

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

        if (Auth::user()->can("update", $model)) {
            $model->fill($input);

            $model->sync($input['tags']);

            $model->push();

            return $model;
        }

        return false;
    }
}