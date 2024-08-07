<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCriteriaComparison extends Model
{
    use HasFactory;

    protected $table = 'subcriteria_comparison';
    protected $guarded = [];

    /**
     * Get the criteria that owns the SubCriteriaComparison
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class, 'criteria_id', 'id');
    }

    public function sub_criteria1(): BelongsTo
    {
        return $this->belongsTo(SubCriteria::class, 'sub_criteria1_id');
    }

    public function sub_criteria2(): BelongsTo
    {
        return $this->belongsTo(SubCriteria::class, 'sub_criteria2_id');
    }
}
