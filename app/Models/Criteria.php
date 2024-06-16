<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criteria';
    protected $guarded = [];

    /**
     * Get all of the alternativeValues for the Alternative
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alternativeValues(): HasMany
    {
        return $this->hasMany(AlternativeValue::class);
    }

    public function criteriaComparisons1(): HasMany
    {
        return $this->hasMany(CriteriaComparison::class, 'kriteria1_id');
    }

    public function criteriaComparisons2(): HasMany
    {
        return $this->hasMany(CriteriaComparison::class, 'kriteria2_id');
    }
}
