<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use App\Models\MataKuliahModel;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index(){
        $mata_kuliah = matakuliah::all();
        return view('mata_kuliah')
            ->with('mata_kuliah', $mata_kuliah);

        }
}
