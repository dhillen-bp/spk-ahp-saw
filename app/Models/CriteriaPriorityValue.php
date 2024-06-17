<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CriteriaPriorityValue extends Model
{

    use HasFactory;

    protected $table = 'criteria_priority_values';
    protected $guarded = [];

    /**
     * Get the criteriaSelected that owns the CriteriaPriorityValue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteriaSelected(): BelongsTo
    {
        return $this->belongsTo(CriteriaSelected::class);
    }

    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class);
    }
}
