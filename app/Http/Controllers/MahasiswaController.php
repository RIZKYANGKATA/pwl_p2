<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\mahasiswa_matakuliah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::with('kelas')->get();
        return view('mahasiswa.mahasiswa', ['mhs' => $mhs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.create_mahasiswa')
            ->with('url_form', url('/mahasiswa'))
            ->with('kelas', $kelas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:225',
            'hp' => 'required|digits_between:6,15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=100,max_height=100',
        ]);
        if ($request->file('foto_profil')){
            $image_name = $request->file('foto_profil')->store('images', 'public');
        }
        
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'foto_profil' => $image_name,
        ]);
        
        return redirect('mahasiswa')
                ->with('success', 'Mahasiswa Berhasil Ditambahkan');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('kelas')->where('id',$id)->first();
        return view('mahasiswa.detail', ['mahasiswa' => $mahasiswa]);
    }

    public function nilai($id)
    {
        $mahasiswa = Mahasiswa::where('id',$id)->first();
        $nilai = mahasiswa_matakuliah::where('mahasiswa_id',$id)->get();
        return view('mahasiswa.nilai')
                ->with('mahasiswa', $mahasiswa)
                ->with('nilai', $nilai);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::all();
        $mhs = Mahasiswa::find($id);
        return view('mahasiswa.create_mahasiswa')
            ->with('mhs', $mhs)
            ->with('url_form', url('/mahasiswa/'. $id))
            ->with('kelas', $kelas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:225',
            'hp' => 'required|digits_between:6,15',
        ]);

        $data = Mahasiswa::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $mahasiswa = Mahasiswa::find($id);

    if (!$mahasiswa) {
        return redirect('mahasiswa')
            ->with('error', 'Mahasiswa tidak ditemukan');
    }

    // Hapus file foto_profil jika ada
    if ($mahasiswa->foto_profil) {
        Storage::delete('public/' . $mahasiswa->foto_profil);
    }

    // Hapus entri terkait di tabel mahasiswa_matakuliah
    mahasiswa_matakuliah::where('mahasiswa_id', '=', $id)->delete();

    $mahasiswa->delete();

    return redirect('mahasiswa')
        ->with('success', 'Mahasiswa Berhasil Dihapus');
}

public function cetak_pdf($id){
    $mahasiswa = Mahasiswa::where('id',$id)->first();
    $nilai = mahasiswa_matakuliah::where('mahasiswa_id',$id)->get();
    $pdf = PDF::loadview('mahasiswa.mahasiswa_pdf', ['nilai'=>$nilai], ['mahasiswa' => $mahasiswa]);
    return $pdf->stream();
}

}
