<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Suspension
 *
 * @property $id
 * @property $people_id
 * @property $register_id
 * @property $start_date
 * @property $end_date
 * @property $reason
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @property Register $register
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Suspension extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['people_id', 'register_id', 'start_date', 'end_date', 'reason', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'people_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function register()
    {
        return $this->belongsTo(\App\Models\Register::class, 'register_id', 'id');
    }
    
}
