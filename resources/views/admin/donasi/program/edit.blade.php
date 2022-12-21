@extends('layouts.admin.master')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data Program Donasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Kelola Data Program Donasi</li>
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
                    <form method="POST" action="{{route('program.ubah', $program -> id_program)}}" enctype="multipart/form-data">
                        @csrf
                      
                        <div class="form-group">
                            <label for="nama_program">Nama Program</label>
                            <input type="text" name="nama_program" id="nama_program" class="form-control" required="required" value="{{ $program->nama_program }}" >
                        </div>
                        <div class="form-group">
                            <label for="dns_butuh">Donasi Butuh</label>
                            <input type="number" name="dns_butuh" id="dns_butuh" class="form-control" required="required" value="{{ $program->dns_butuh }}" >
                        </div>
                        <div class="form-group">
                            <label for="dns_terkumpul">Donasi Terkumpul</label>
                            <input type="number" name="dns_terkumpul" id="dns_terkumpul" class="form-control" value="{{ $program->dns_terkumpul }}" >
                        </div>
                        <div class="form-group">
                          <label for="dns_terkumpul">Status</label>
                          <input type="text" name="status" id="status" class="form-control" value="{{ $program->status }}" >
                      </div>
                        <a class="btn btn-secondary " href="{{ route('program.index') }}">Kembali</a>
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