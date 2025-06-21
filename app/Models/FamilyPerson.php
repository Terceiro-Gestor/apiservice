<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FamilyPerson
 *
 * @property $id
 * @property $family_id
 * @property $people_id
 * @property $relationship
 * @property $composes_income
 * @property $lives_in_household
 * @property $is
 * @property $created_at
 * @property $updated_at
 *
 * @property Family $family
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FamilyPerson extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['family_id', 'people_id', 'relationship', 'composes_income', 'lives_in_household', 'is'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function family()
    {
        return $this->belongsTo(\App\Models\Family::class, 'family_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'people_id', 'id');
    }
    
}
