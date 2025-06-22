<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
/**
 * Class Contact
 *
 * @property $id
 * @property $people_id
 * @property $type
 * @property $value
 * @property $main
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contact extends Model
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
    protected $fillable = ['person_id', 'type', 'value', 'main'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'person_id', 'id');
    }
    
}
