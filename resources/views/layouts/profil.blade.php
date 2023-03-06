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
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('assets/dist/img/user1-128x128.jpg') }}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{$nama}}</h3>
  
                  <p class="text-muted text-center">Calon Bos Muda</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Kelas : </b>{{$kelas}}
                    </li>
                    <li class="list-group-item">
                      <b>NIM : </b>{{$nim}}
                    </li>
                    <li class="list-group-item">
                      <b>Jurusan : </b>{{$jurusan}}
                    </li>
                  </ul>
  
                  <a href="#" class="btn btn-danger btn-block"><b>Follow</b></a>
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