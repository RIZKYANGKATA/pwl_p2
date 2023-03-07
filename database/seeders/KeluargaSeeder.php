<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
            [
                'no' => '1',
                'nama' => 'Rizky',
                'peran' => 'Rusher',
                'jk' => 'Laki-laki'
            ],
            [
                'no' => '2',
                'nama' => 'Angkata',
                'peran' => 'Flanker',
                'jk' => 'Laki-laki'
            ]
            ]);
    }
}
