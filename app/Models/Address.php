<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;


/**
 * Class Address
 *
 * @property $id
 * @property $street
 * @property $city
 * @property $country
 * @property $state
 * @property $postal_code
 * @property $complement
 * @property $created_at
 * @property $updated_at
 *
 * @property Person[] $people
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Address extends Model
{
    
    use HasUuid;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['street', 'city', 'country', 'state', 'postal_code', 'complement'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function people()
    {
        return $this->hasMany(\App\Models\Person::class, 'id', 'address_id');
    }
    
}
