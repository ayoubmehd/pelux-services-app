<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package App\Models
 * @version September 22, 2021, 3:24 pm UTC
 *
 * @property \App\Models\Service $service
 * @property \App\Models\User $user
 * @property string $status
 * @property integer $service_id
 * @property integer $user_id
 */
class Order extends Model
{

    use HasFactory;

    public $table = 'orders';
    



    public $fillable = [
        'status',
        'service_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'string',
        'service_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required|string|string',
        'created_at' => 'nullable|nullable',
        'updated_at' => 'nullable|nullable',
        'service_id' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
