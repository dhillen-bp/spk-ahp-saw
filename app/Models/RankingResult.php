<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RankingResult extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the alternative that owns the RankingResult
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alternative(): BelongsTo
    {
        return $this->belongsTo(Alternative::class);
    }

    /**
     * The criteriaSelect that belong to the RankingResult
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function criteriaSelected()
    {
        return $this->belongsTo(CriteriaSelected::class);
    }
}
