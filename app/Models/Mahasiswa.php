<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
            'nim',
            'nama',
            'jk',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'hp',
            'kelas_id',
            'foto_profil'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');

    }

    public function mahasiswa_matakuliah()
    {
        return $this->belongsToMany(mahasiswa_matakuliah::class, 'mahasiswa_matakuliah');
    }
}
