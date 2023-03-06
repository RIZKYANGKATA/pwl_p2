<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kendaraan')->insert([
            [
                'nopol' => 'R 1 KY',
                'merk' => 'Honda',
                'jenis' => 'Supra X',
                'tahun_buat' => '2000',
                'warna' => 'Putih'
            ],
            [
                'nopol' => 'A 4 ZY',
                'merk' => 'Honda',
                'jenis' => 'Vario',
                'tahun_buat' => '2001',
                'warna' => 'Hitam'
            ]
            ]);
    }
}
