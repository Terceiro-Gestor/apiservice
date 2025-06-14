<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;


/**
 * Class Occurrence
 *
 * @property $id
 * @property $person_id
 * @property $date
 * @property $type
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Occurrence extends Model
{
    
    use HasUuid;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['person_id', 'date', 'type', 'description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'person_id', 'id');
    }
    
}
