<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Register
 *
 * @property $id
 * @property $people_id
 * @property $service_id
 * @property $registers_number
 * @property $registers_date
 * @property $expiration_date
 * @property $expiration_reason_id
 * @property $status
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @property ExpirationReason $expirationReason
 * @property Person $person
 * @property Service $service
 * @property Attendance[] $attendances
 * @property Daily[] $dailys
 * @property Occurrence[] $occurrences
 * @property Presence[] $presences
 * @property Referral[] $referrals
 * @property Suspension[] $suspensions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Register extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['people_id', 'service_id', 'registers_number', 'registers_date', 'expiration_date', 'expiration_reason_id', 'status', 'notes'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expirationReason()
    {
        return $this->belongsTo(\App\Models\ExpirationReason::class, 'expiration_reason_id', 'id');
    }
    
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
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class, 'service_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances()
    {
        return $this->hasMany(\App\Models\Attendance::class, 'id', 'register_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dailys()
    {
        return $this->hasMany(\App\Models\Daily::class, 'id', 'register_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function occurrences()
    {
        return $this->hasMany(\App\Models\Occurrence::class, 'id', 'register_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presences()
    {
        return $this->hasMany(\App\Models\Presence::class, 'id', 'register_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(\App\Models\Referral::class, 'id', 'register_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suspensions()
    {
        return $this->hasMany(\App\Models\Suspension::class, 'id', 'register_id');
    }
    
}
