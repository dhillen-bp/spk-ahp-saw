<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'pemerintah_desa',
                'desc' => 'admin / developer',
            ],
            [
                'nama' => 'Wachid Mardiyanto',
                'username' => 'rt1rw3',
                'password' => Hash::make('123'),
                'role' => 'rt_rw',
                'desc' => 'KETUA RT 001 RW 003',
            ],
            [
                'nama' => 'Ikhwanto S.Ag',
                'username' => 'rt2rw3',
                'password' => Hash::make('123'),
                'role' => 'rt_rw',
                'desc' => 'KETUA RT 002 RW 003',
            ],
            [
                'nama' => 'Samino',
                'username' => 'rt3rw3',
                'password' => Hash::make('123'),
                'role' => 'rt_rw',
                'desc' => 'KETUA RT 003 RW 003',
            ],
        ];

        foreach ($data as $item) {
            Admin::create($item);
        }
    }
}
