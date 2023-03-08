@extends('layouts.template')

@section('title')
    Mata Kuliah
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Mata Kuliah</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Mata Kuliah</li>
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
                        <th>Kode Mk</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Jam</th>
                        <th>Niali</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($mata_kuliah as $no => $mk)
                          <tr>
                            <td>{{$mk->no}}</td>
                            <td>{{$mk->kodemk}}</td>
                            <td>{{$mk->matkul}}</td>
                            <td>{{$mk->sks}}</td>
                            <td>{{$mk->jam}}</td>
                            <td>{{$mk->nilai}}</td>
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