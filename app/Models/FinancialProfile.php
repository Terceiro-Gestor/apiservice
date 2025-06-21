<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FinancialProfile
 *
 * @property $id
 * @property $people_id
 * @property $category_financial_id
 * @property $amount
 * @property $date
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property CategoryFinancial $categoryFinancial
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FinancialProfile extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['people_id', 'category_financial_id', 'amount', 'date', 'description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryFinancial()
    {
        return $this->belongsTo(\App\Models\CategoryFinancial::class, 'category_financial_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'people_id', 'id');
    }
    
}
