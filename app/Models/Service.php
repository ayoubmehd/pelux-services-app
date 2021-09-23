<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Service
 * @package App\Models
 * @version September 22, 2021, 3:16 pm UTC
 *
 * @property \App\Models\City $city
 * @property \App\Models\User $provider
 * @property string $title
 * @property string $description
 * @property number $lat
 * @property number $long
 * @property integer $city_id
 * @property integer $provider_id
 * @property boolean $is_publised
 */
class Service extends Model
{

    use HasFactory;

    public $table = 'services';




    public $fillable = [
        'title',
        'description',
        'lat',
        'long',
        'is_publised'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'lat' => 'float',
        'long' => 'float',
        'city_id' => 'integer',
        'provider_id' => 'integer',
        'is_publised' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:255|nullable|string|max:255',
        'description' => 'nullable|string|nullable|string',
        'lat' => 'nullable|numeric|nullable|numeric',
        'long' => 'nullable|numeric|nullable|numeric',
        'city_id' => 'required|integer|integer',
        'provider_id' => 'required|integer|integer',
        'is_publised' => 'nullable|boolean|nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     **/
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_service');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}