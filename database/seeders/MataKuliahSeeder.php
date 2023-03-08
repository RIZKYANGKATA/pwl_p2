<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mata_kuliah')->insert([
            [
                'no' => '1',
                'kodemk' => 'RI3107',
                'matkul' => 'Pemrograman Web Lanjut',
                'sks' => '3',
                'jam' => '6',
                'nilai' => 'A'
            ],
            [
                'no' => '2',
                'kodemk' => 'RI2141',
                'matkul' => 'Kewarganegaraan',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'B'
            ],
            [
                'no' => '3',
                'kodemk' => 'RI7202',
                'matkul' => 'Jaringan Komputer',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'A'
            ],
            [
                'no' => '4',
                'kodemk' => 'RI2307',
                'matkul' => 'Praktikum Jaringan Komputer',
                'sks' => '3',
                'jam' => '6',
                'nilai' => 'A'
            ],
            [
                'no' => '5',
                'kodemk' => 'RI6666',
                'matkul' => 'Proyek',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'A'
            ],
            [
                'no' => '6',
                'kodemk' => 'RI9999',
                'matkul' => 'Manajemen Proyek',
                'sks' => '2',
                'jam' => '4',
                'nilai' => 'A'
            ]
            ]);
    }
}
