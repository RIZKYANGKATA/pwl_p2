@extends('layouts.template')

@section('title')
    Hobi
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Hobi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Hobi</li>
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
                        <th>Hobi</th>
                        <th>Deskripsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($hobi as $no => $h)
                          <tr>
                            <td>{{$h->no}}</td>
                            <td>{{$h->hobi}}</td>
                            <td>{{$h->deskripsi}}</td>
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