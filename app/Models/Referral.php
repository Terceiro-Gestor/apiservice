<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Referral
 *
 * @property $id
 * @property $people_id
 * @property $register_id
 * @property $referred_by_id
 * @property $service_id
 * @property $date
 * @property $status
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @property Employee $employee
 * @property Register $register
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Referral extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['people_id', 'register_id', 'referred_by_id', 'service_id', 'date', 'status', 'notes'];


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
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'referred_by_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function register()
    {
        return $this->belongsTo(\App\Models\Register::class, 'register_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class, 'service_id', 'id');
    }
    
}
