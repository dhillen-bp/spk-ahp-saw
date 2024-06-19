<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CriteriaComparison extends Model
{
    use HasFactory;

    protected $table = 'criteria_comparison';
    protected $guarded = [];

    /**
     * Get the kriteria1 that owns the CriteriaComparison
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kriteria1(): BelongsTo
    {
        return $this->belongsTo(Criteria::class, 'kriteria1_id');
    }

    public function kriteria2(): BelongsTo
    {
        return $this->belongsTo(Criteria::class, 'kriteria2_id');
    }

    public function criteriaSelected()
    {
        return $this->belongsTo(CriteriaSelected::class, 'criteria_selected_id');
    }
}
