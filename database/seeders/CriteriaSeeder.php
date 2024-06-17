<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Pendapatan',
                'atribut' => 'benefit',
            ],
            [
                'nama' => 'Pekerjaan',
                'atribut' => 'cost',
            ],
            [
                'nama' => 'Jumlah Tanggungan',
                'atribut' => 'benefit',
            ],
            [
                'nama' => 'Usia',
                'atribut' => 'benefit',
            ],
            [
                'nama' => 'Kondisi Kesehatan',
                'atribut' => 'cost',
            ],
        ];

        foreach ($data as $item) {
            Criteria::create($item);
        }
    }
}
