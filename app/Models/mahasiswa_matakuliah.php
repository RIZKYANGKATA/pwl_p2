<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa_matakuliah extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_matakuliah';

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}
