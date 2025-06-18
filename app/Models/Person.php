<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Person
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $phone
 * @property $birth_date
 * @property $address_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Address $address
 * @property Occurrence[] $occurrences
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Person extends Model
{

    use HasUuids;
    protected $perPage = 20;
    protected $casts = [
        'id' => 'string', // ou simplesmente remova essa linha
    ];
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'phone', 'birth_date', 'address_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(\App\Models\Address::class, 'address_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function occurrences()
    {
        return $this->hasMany(\App\Models\Occurrence::class, 'id', 'person_id');
    }
}
