<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version September 22, 2021, 11:29 am UTC
 */

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'role'
    ];

    /**
     * Override create method
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance(collect($input)->except('password')->toArray());

        $model->password = Hash::make($input['password']);

        $model->save();

        return $model;
    }

    /**
     * Override update method
     *
     * @return Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill(collect($input)->except('password')->toArray());

        if ($input['password']) {
            $model->password = Hash::make($input['password']);
        }

        $model->save();

        return $model;
    }
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
        return User::class;
    }
}