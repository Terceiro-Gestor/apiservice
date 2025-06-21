<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Daily
 *
 * @property $id
 * @property $people_id
 * @property $register_id
 * @property $date
 * @property $type
 * @property $description
 * @property $case_discussion
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @property Register $register
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Daily extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['people_id', 'register_id', 'date', 'type', 'description', 'case_discussion'];


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
