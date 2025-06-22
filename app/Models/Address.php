<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Arr;

/**
 * Class Address
 *
 * @property $id
 * @property $street
 * @property $number
 * @property $complement
 * @property $district
 * @property $city
 * @property $state
 * @property $country
 * @property $postal_code
 * @property $created_at
 * @property $updated_at
 *
 * @property Person[] $people
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Address extends Model
{

    protected $perPage = 20;
    use HasUuids;
    protected $casts = ['id' => 'string'];
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['street', 'number', 'complement', 'district', 'city', 'state', 'country', 'postal_code'];

    public static function findOrCreateFromData(array $data): Address
    {
        $addressData = Arr::only($data, [
            'street',
            'number',
            'complement',
            'district',
            'city',
            'state',
            'country',
            'postal_code',
        ]);

        return self::firstOrCreate($addressData);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function people()
    {
        return $this->hasMany(\App\Models\Person::class, 'id', 'address_id');
    }
}
