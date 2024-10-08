<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenReport extends Model
{
    use HasFactory;

    protected $table = 'citizen_reports';
    protected $guarded = [];
}
