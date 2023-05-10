<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul = [
            [
                'nama_matkul' => 'Pemrograman Berbasis Objek',
                'sks' => 3,
                'jam' => 6,
                'semester' => 4,
            ],
            [
                'nama_matkul' => 'Pemrograman Web Lanjut',
                'sks' => 3,
                'jam' => 6,
                'semester' => 4,
            ],
            [
                'nama_matkul' => 'Basis Data Lanjut',
                'sks' => 3,
                'jam' => 4,
                'semester' => 4,
            ],
            [
                'nama_matkul' => 'Praktium Basis Data Lanjut',
                'sks' => 3,
                'jam' => 6,
                'semester' => 4,
            ],
        ];
        DB::table('matkul')->insert($matkul);
    }
}
