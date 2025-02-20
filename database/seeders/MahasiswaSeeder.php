<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Mahasiswa::create([
            'nim' => '00722345',
            'nama' => 'Yosefin',
            'jurusan' => 'SIJA',
            'notelp' => '087856249352',
        ]);
    }
}
