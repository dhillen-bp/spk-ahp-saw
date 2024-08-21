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
                'nama' => "Rendah (dibawah UMR)",
                'nilai' => 5,
                'criteria_id' => 1
            ],
            [
                'nama' => "Cukup (sesuai UMR)",
                'nilai' => 3,
                'criteria_id' => 1
            ],
            [
                'nama' => "Lebih (diatas UMR)",
                'nilai' => 1,
                'criteria_id' => 1
            ],
            [
                'nama' => "Tidak Bekerja",
                'nilai' => 5,
                'criteria_id' => 2
            ],
            [
                'nama' => "Pelajar",
                'nilai' => 4,
                'criteria_id' => 2
            ],
            [
                'nama' => "Buruh Harian Lepas",
                'nilai' => 3,
                'criteria_id' => 2
            ],
            [
                'nama' => "Buruh Tani/Ternak",
                'nilai' => 2,
                'criteria_id' => 2
            ],
            [
                'nama' => "Karyawan Swasta",
                'nilai' => 1,
                'criteria_id' => 2
            ],
            [
                'nama' => "Penyakit Kronis/Difabel/ODGJ",
                'nilai' => 5,
                'criteria_id' => 5
            ],
            [
                'nama' => "Tidak Ada",
                'nilai' => 1,
                'criteria_id' => 5
            ],
            [
                'nama' => "KK Lansia Tunggal",
                'nilai' => 5,
                'criteria_id' => 6
            ],
            [
                'nama' => "Yatim Piatu",
                'nilai' => 4,
                'criteria_id' => 6
            ],
            [
                'nama' => "Janda",
                'nilai' => 3,
                'criteria_id' => 6
            ],
            [
                'nama' => "-",
                'nilai' => 1,
                'criteria_id' => 6
            ],
        ];

        foreach ($data as $item) {
            SubCriteria::create($item);
        }
    }
}
