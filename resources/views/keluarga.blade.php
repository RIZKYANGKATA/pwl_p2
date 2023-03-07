@extends('layouts.template')

@section('title')
    Keluarga
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Keluarga</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Keluarga</li>
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
                        <th>Nama</th>
                        <th>Peran</th>
                        <th>Jenis Kelamin</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($keluarga as $no => $k)
                          <tr>
                            <td>{{$k->no}}</td>
                            <td>{{$k->nama}}</td>
                            <td>{{$k->peran}}</td>
                            <td>{{$k->jk}}</td>
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