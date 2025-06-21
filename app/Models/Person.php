<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Person
 *
 * @property $id
 * @property $photo
 * @property $full_name
 * @property $social_name
 * @property $birth_date
 * @property $gender
 * @property $ethnicity
 * @property $marital_status
 * @property $country
 * @property $state
 * @property $city
 * @property $nis
 * @property $cpf
 * @property $rg
 * @property $address_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Address $address
 * @property Attendance[] $attendances
 * @property Contact[] $contacts
 * @property Daily[] $dailys
 * @property FamilyPerson[] $familyPeoples
 * @property FinancialProfile[] $financialProfiles
 * @property Occurrence[] $occurrences
 * @property PeopleRelationship[] $peopleRelationships
 * @property PeopleRelationship[] $peopleRelationships
 * @property Presence[] $presences
 * @property Referral[] $referrals
 * @property Register[] $registers
 * @property Suspension[] $suspensions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Person extends Model
{

    use HasUuids;
    protected $perPage = 20;
    protected $casts = ['id' => 'string'];
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['photo', 'full_name', 'social_name', 'birth_date', 'gender', 'ethnicity', 'marital_status', 'country', 'state', 'city', 'nis', 'cpf', 'rg', 'address_id'];

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
    public function attendances()
    {
        return $this->hasMany(\App\Models\Attendance::class, 'id', 'people_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(\App\Models\Contact::class, 'person_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dailys()
    {
        return $this->hasMany(\App\Models\Daily::class, 'id', 'people_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familyPeoples()
    {
        return $this->hasMany(\App\Models\FamilyPerson::class, 'id', 'people_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function financialProfiles()
    {
        return $this->hasMany(\App\Models\FinancialProfile::class, 'id', 'people_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function occurrences()
    {
        return $this->hasMany(\App\Models\Occurrence::class, 'id', 'person_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peopleRelationships()
    {
        return $this->hasMany(\App\Models\PeopleRelationship::class, 'id', 'person_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relatedPeopleRelationships()
    {
        return $this->hasMany(\App\Models\PeopleRelationship::class, 'id', 'related_person_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presences()
    {
        return $this->hasMany(\App\Models\Presence::class, 'id', 'people_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(\App\Models\Referral::class, 'id', 'people_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registers()
    {
        return $this->hasMany(\App\Models\Register::class, 'id', 'people_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suspensions()
    {
        return $this->hasMany(\App\Models\Suspension::class, 'id', 'people_id');
    }
}
