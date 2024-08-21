<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AlternativeValue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CriteriaSeeder::class,
            SubCriteriaSeeder::class,
            AdminSeeder::class,
            AlternativeSeeder::class,
            CriteriaSelectedSeeder::class,
            CriteriaComparisonSeeder::class,
            AlternativeValueSeeder::class,
        ]);
    }
}
