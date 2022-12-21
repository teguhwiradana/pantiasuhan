@extends('layouts.admin.master')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data Binaan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Kelola Data Binaan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada Kesalahan dalam Data Penginputan<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('binaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_binaan">Nama Binaan</label>
                            <input type="text" name="nama_binaan" class="form-control" id="nama_binaan" aria-describedby="nama_binaan" >
                        </div>
                        <div class="form-group">
                            <label for="ttl">Tempat Tanggal Lahir</label>
                            <input type="date" name="ttl" class="form-control" id="ttl" aria-describedby="ttl" >
                        </div>
                        <div class="form-group">
                            <label for="jekel">Jenis Kelamin</label>
                            <input type="text" name="jekel" class="form-control" id="jekel" aria-describedby="jekel" >
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" name="pendidikan" class="form-control" id="pendidikan" aria-describedby="pendidikan" >
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" name="umur" class="form-control" id="umur" aria-describedby="umur" >
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="kelas" aria-describedby="kelas" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" id="status" aria-describedby="status" >
                        </div>
                        <div class="form-group">
                          <label for="domisili">Domisili</label>
                          <input type="text" name="domisili" class="form-control" id="domisili" aria-describedby="domisili" >
                        </div>
                        <a class="btn btn-secondary " href="{{ route('binaan.index') }}">Kembali</a>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
        <!-- /.card-footer-->
      </div>
        
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection