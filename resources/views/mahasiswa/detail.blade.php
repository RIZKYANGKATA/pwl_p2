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
              <h1>Mahasiswa</h1>
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
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nama: </b> {{ $mahasiswa->nama }}</li>
                    <li class="list-group-item"><b>Kelas: </b> {{ $mahasiswa->kelas->nama_kelas }}</li>
                    <li class="list-group-item"><b>Jenis Kelamin: </b> {{ $mahasiswa->jk }}</li>
                    <li class="list-group-item"><b>Tempat Lahir: </b> {{ $mahasiswa->tempat_lahir }}</li>
                    <li class="list-group-item"><b>Tanggal Lahir: </b> {{ $mahasiswa->tanggal_lahir }}</li>
                    <li class="list-group-item"><b>Alamat: </b> {{ $mahasiswa->alamat }}</li>
                    <li class="list-group-item"><b>No. HP: </b> {{ $mahasiswa->hp }}</li>
                </ul>        
                <a href="{{url('mahasiswa')}}" class="btn btn-default"><i class="fas fa-arrow-left pr-1"></i>Back</a>
          </div>
            </div>
                  </ul>
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