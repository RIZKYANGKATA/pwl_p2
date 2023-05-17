@extends('layouts.template')

@section('title')
  Mahasiswa
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Mahasiswa</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body">

                  <a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>

                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Foto Profil</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Hp</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($mhs->count() > 0)
                        @foreach($mhs as $i => $m)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$m->nim}}</td>
                            <td>{{$m->nama}}</td>
                            <td><img width="150px" src="{{asset('storage/'.$m->foto_profil)}}"></td>
                            <td>{{$m->kelas->nama_kelas}}</td>
                            <td>{{$m->jk}}</td>
                            <td>{{$m->hp}}</td>
                            <td style="display: flex">
                              <a href="{{ url('/mahasiswa/'. $m->id)}}" class="btn btn-sm btn-secondary mr-2">Show</a>
                              <a href="{{ url('/mahasiswa/'. $m->id.'/nilai') }}" class="btn btn-sm btn-primary mr-2">Nilai</a>

                              <a href="{{ url('/mahasiswa/'. $m->id.'/edit')}}" class="btn btn-sm btn-warning mr-2">Edit</a>

                              <form method="POST" action="{{ url('/mahasiswa/'.$m->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      @else
                          <tr><td colspan="6" class="text-center">Data Tidak Ada</td></tr>
                      @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection