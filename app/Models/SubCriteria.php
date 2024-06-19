<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_criteria';
    protected $guarded = [];

    /**
     * Get the criteria that owns the SubCriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteria(): BelongsTo
    {
        return $this->belongsTo(Criteria::class, 'criteria_id', 'id');
    }
}
