@extends('layouts.template')

@section('title')
    Profile
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
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
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nopol</th>
                        <th>Merk</th>
                        <th>Jenis</th>
                        <th>Tahun Buat</th>
                        <th>Warna</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($kendaraan as $no => $m)
                          <tr>
                            <td>{{$no}}</td>
                            <td>{{$m->nopol}}</td>
                            <td>{{$m->merk}}</td>
                            <td>{{$m->jenis}}</td>
                            <td>{{$m->tahun_buat}}</td>
                            <td>{{$m->warna}}</td>
                          </tr>
                      @endforeach
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