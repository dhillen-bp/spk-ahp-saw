<?php

namespace Database\Seeders;

use App\Models\CriteriaComparison;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaComparisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 1,
                'kriteria2_id' => 2,
                'nilai_kriteria1' => 0.500,
                'nilai_kriteria2' => 2.000,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 1,
                'kriteria2_id' => 3,
                'nilai_kriteria1' => 3.000,
                'nilai_kriteria2' => 0.333,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 1,
                'kriteria2_id' => 4,
                'nilai_kriteria1' => 3.000,
                'nilai_kriteria2' => 0.333,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 1,
                'kriteria2_id' => 5,
                'nilai_kriteria1' => 0.250,
                'nilai_kriteria2' => 4.000,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 1,
                'kriteria2_id' => 6,
                'nilai_kriteria1' => 0.250,
                'nilai_kriteria2' => 4.000,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 2,
                'kriteria2_id' => 3,
                'nilai_kriteria1' => 3.000,
                'nilai_kriteria2' => 0.333,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 2,
                'kriteria2_id' => 4,
                'nilai_kriteria1' => 3.000,
                'nilai_kriteria2' => 0.333,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 2,
                'kriteria2_id' => 5,
                'nilai_kriteria1' => 0.250,
                'nilai_kriteria2' => 4.000,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 2,
                'kriteria2_id' => 6,
                'nilai_kriteria1' => 0.250,
                'nilai_kriteria2' => 4.000,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 3,
                'kriteria2_id' => 4,
                'nilai_kriteria1' => 2.000,
                'nilai_kriteria2' => 0.500,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 3,
                'kriteria2_id' => 5,
                'nilai_kriteria1' => 0.250,
                'nilai_kriteria2' => 4.000,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 3,
                'kriteria2_id' => 6,
                'nilai_kriteria1' => 0.200,
                'nilai_kriteria2' => 5.000,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 4,
                'kriteria2_id' => 5,
                'nilai_kriteria1' => 0.250,
                'nilai_kriteria2' => 4.000,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 4,
                'kriteria2_id' => 6,
                'nilai_kriteria1' => 0.200,
                'nilai_kriteria2' => 5.000,
            ],
            [
                'criteria_selected_id' => 1,
                'kriteria1_id' => 5,
                'kriteria2_id' => 6,
                'nilai_kriteria1' => 0.333,
                'nilai_kriteria2' => 3.000,
            ],
        ];

        foreach ($data as $item) {
            CriteriaComparison::create($item);
        };
    }
}
