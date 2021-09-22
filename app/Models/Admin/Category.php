<?php

namespace App\Models\Admin;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Category
 * @package App\Models\Admin
 * @version September 22, 2021, 2:00 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $services
 * @property string $name
 */
class Category extends Model
{

    use HasFactory;

    public $table = 'categories';
    



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255|string|max:255',
        'created_at' => 'nullable|nullable',
        'updated_at' => 'nullable|nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function services()
    {
        return $this->belongsToMany(\App\Models\Admin\Service::class, 'services_categores');
    }
}
