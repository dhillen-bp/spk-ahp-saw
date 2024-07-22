<?php

namespace Database\Seeders;

use App\Models\SubCriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => "Tidak Bekerja",
                'nilai' => 5,
                'criteria_id' => 2
            ],
            [
                'nama' => "Pekerjaan Tidak Tetap",
                'nilai' => 3,
                'criteria_id' => 2
            ],
            [
                'nama' => "Pekerjaan Tetap",
                'nilai' => 1,
                'criteria_id' => 2
            ],
            [
                'nama' => "Ada lebih dari 1",
                'nilai' => 5,
                'criteria_id' => 5
            ],
            [
                'nama' => "Ada 1",
                'nilai' => 3,
                'criteria_id' => 5
            ],
            [
                'nama' => "Tidak Mempunyai",
                'nilai' => 1,
                'criteria_id' => 5
            ],
            [
                'nama' => "KK Lansia Tunggal",
                'nilai' => 5,
                'criteria_id' => 6
            ],
            [
                'nama' => "Janda atau Yatim Piatu",
                'nilai' => 4,
                'criteria_id' => 6
            ],
            [
                'nama' => "Duda",
                'nilai' => 3,
                'criteria_id' => 6
            ],
            [
                'nama' => "Keluarga Lengkap",
                'nilai' => 1,
                'criteria_id' => 6
            ],
        ];

        foreach ($data as $item) {
            SubCriteria::create($item);
        }
    }
}
