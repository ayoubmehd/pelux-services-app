<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Adress
 * @package App\Models
 * @version September 22, 2021, 3:07 pm UTC
 *
 * @property \App\Models\City $city
 * @property string $ligne1
 * @property string $ligne2
 * @property integer $city_id
 */
class Adress extends Model
{

    use HasFactory;

    public $table = 'adresses';




    public $fillable = [
        'ligne1',
        'ligne2',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ligne1' => 'string',
        'ligne2' => 'string',
        'city_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ligne1' => 'required|string|max:255|string|max:255',
        'ligne2' => 'nullable|string|max:255|string|max:255',
        'created_at' => 'nullable|nullable',
        'updated_at' => 'nullable|nullable',
        'city_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id');
    }
}