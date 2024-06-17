<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CriteriaSelected extends Model
{
    use HasFactory;
    protected $table = 'criteria_selected';
    protected $guarded = [];

    /**
     * Get all of the criteriaComparisons for the CriteriaSelected
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function criteriaComparisons(): HasMany
    {
        return $this->hasMany(CriteriaComparison::class, 'criteria_selected_id');
    }

    public function criteriaPriorityValues(): HasMany
    {
        return $this->hasMany(CriteriaPriorityValue::class, 'criteria_selected_id');
    }
}
