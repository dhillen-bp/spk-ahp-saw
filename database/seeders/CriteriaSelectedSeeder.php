<?php

namespace Database\Seeders;

use App\Models\CriteriaSelected;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSelectedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => '2024',
                'jumlah_penerima' => 26,
                'keterangan' => 'Pemilihan Penerima BLT Dana Desa Tahun 2024',
            ],
        ];

        foreach ($data as $item) {
            CriteriaSelected::create($item);
        }
    }
}
