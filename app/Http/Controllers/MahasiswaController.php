<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\mahasiswa_matakuliah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.mahasiswa');
    }

    public function data()
    {
        $data = Mahasiswa::selectRaw('id, nim, nama, hp');

        return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
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
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = Mahasiswa::create($request->all());
        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs)? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa) {
            return response()->json($mahasiswa);

        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }


    public function show_old($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('mahasiswa.show_mhs')
            ->with('mhs', $mhs);
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
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = Mahasiswa::where('id', $id)->update($request->except('_token', '_method'));

        return response()->json([
            'status' => ($mhs),
            'modal_close' => $mhs,
            'message' => ($mhs)? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */

     public function destroy($id){
        $mhs = Mahasiswa::where('id', $id)->delete();
        return response()->json([
            'status' => ($mhs),
            'message' => ($mhs)? 'Data berhasil dihapus' : 'Data gagal dihapus',
            'data' => null
        ]);
    }
    public function destroyold($id)
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
