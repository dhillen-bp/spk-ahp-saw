<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alternative extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function alternativeValues(): HasMany
    {
        return $this->hasMany(AlternativeValue::class);
    }

    public function rankingResults(): HasMany
    {
        return $this->hasMany(RankingResult::class);
    }
}
