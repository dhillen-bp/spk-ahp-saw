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
                'nama' => 'Pak RT',
                'username' => 'rt01',
                'password' => Hash::make('123'),
                'role' => 'rt_rw',
                'desc' => 'Test user as RT/RW',
            ],
        ];

        foreach ($data as $item) {
            Admin::create($item);
        }
    }
}
