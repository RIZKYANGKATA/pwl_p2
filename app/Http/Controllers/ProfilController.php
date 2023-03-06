<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(){
        $nama = 'Rizky Angkata Putra S.';
        $kelas = 'TI-2B';
        $nim = '2141720223';
        $jurusan = 'Teknik Informatika';
        return view('layouts.profil')
            ->with('nama', $nama)
            ->with('kelas', $kelas)
            ->with('nim', $nim)
            ->with('jurusan', $jurusan);
        }
}
