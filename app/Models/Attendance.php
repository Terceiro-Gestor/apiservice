<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Attendance
 *
 * @property $id
 * @property $people_id
 * @property $register_id
 * @property $employee_id
 * @property $service_type
 * @property $attendance_type
 * @property $attendance_date
 * @property $start_time
 * @property $end_time
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property Person $person
 * @property Register $register
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Attendance extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['people_id', 'register_id', 'employee_id', 'service_type', 'attendance_type', 'attendance_date', 'start_time', 'end_time', 'notes'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id', 'id');
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
    public function register()
    {
        return $this->belongsTo(\App\Models\Register::class, 'register_id', 'id');
    }
    
}
