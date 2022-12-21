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
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('binaan.update', $binaan->id_binaan) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_binaan">Nama Binaan</label>
                            <input type="text" name="nama_binaan" id="nama_binaan" class="form-control" required="required" value="{{$binaan->nama_binaan }}" >
                        </div>
                        <div class="form-group">
                            <label for="ttl">Tempat Tanggal Lahir</label>
                            <input type="date" name="ttl" id="ttl" class="form-control" required="required" value="{{ $binaan->ttl }}" >
                        </div>
                        <div class="form-group">
                            <label for="jekel">Jenis Kelamin</label>
                            <input type="text" name="jekel" id="jekel" class="form-control" required="required" value="{{ $binaan->jekel }}" >
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" name="pendidikan" id="pendidikan" class="form-control" required="required" value="{{ $binaan->pendidikan }}" >
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" name="umur" id="umur" class="form-control" required="required" value="{{ $binaan->umur }}" >
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control" required="required" value="{{ $binaan->kelas }}" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status" class="form-control" required="required" value="{{ $binaan->status }}" >
                        </div>
                        <div class="form-group">
                          <label for="domisili">Domisili</label>
                          <input type="text" name="domisili" id="domisili" class="form-control" required="required" value="{{ $binaan->domisili }}" >
                        </div>
                        <a class="btn btn-secondary " href="{{ route('binaan.index') }}">Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
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