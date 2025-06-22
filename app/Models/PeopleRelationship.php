<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PeopleRelationship
 *
 * @property $id
 * @property $person_id
 * @property $related_person_id
 * @property $relationship
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PeopleRelationship extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['person_id', 'related_person_id', 'relationship'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'person_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relatedPeopleRelationships()
    {
        return $this->belongsTo(\App\Models\Person::class, 'related_person_id', 'id');
    }
    
}
