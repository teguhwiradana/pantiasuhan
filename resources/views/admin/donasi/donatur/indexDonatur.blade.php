@extends('layouts.admin.master')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kelola Data Donasi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Kelola Data</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Donasi</h3>
    </div>
    <div class="card-body">
      <a class="btn btn-primary" href="{{ route('donatur.create') }}">Tambah Data Donatur</a>
      <a class="btn btn-danger" href="{{ route('donatur.cetak', $program->id_program) }}"><i class="bi bi-printer"></i>
        Cetak Laporan Donasi</a>
        
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
     @endif 

   
      <br><br>
      <form class="form" method="get" action="{{route('donatur.cari', $program->id_program)}}">
        <div class="form-group w-100 mb-3">
          <label for="search" class="d-block mr-2">Pencarian Data Donatur</label>
          <input type="text" name="cari" class="form-control w-50 d-inline" id="cari" placeholder="Nama Donasi">
          <button type="submit" class="btn btn-success mb-1"><i class="bi bi-search"></i></button>
        </div>
      </form>
      <div class="table-responsive">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Alamat</th>
              <th>Nominal</th>
              <th>Atas Nama</th>
              <th>Nama Bank</th>
              <th>No Rekening Donatur</th>
              <th>Keterangan</th>
              <th>Bukti Transfer</th>
              <th>Status</th>
              <th>Lihat Data</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($donatur as $donasi)
            <tr>
              <td class="text-black">{{ $loop -> iteration}}</td>
              <td class="text-black">{{ $donasi->name}}</td>
              <td class="text-black">{{ $donasi->tgl_donasi}}</td>
              <td class="text-black">{{ $donasi->alamat }}</td>
              <td class="text-black">{{ $donasi->nominal }}</td>
              <td class="text-black">{{ $donasi->atas_nama }}</td>
              <td class="text-black">{{ $donasi->nama_bank }}</td>
              <td class="text-black">{{ $donasi->no_rekening }}</td>
              {{-- //TODO keterangan tidak muncul --}}
              <td class="text-black">{{ $donasi->keterangan }}</td>
              <td>
                <img width="100px" height="100px" src="{{asset('storage/'.$donasi -> bukti_tf)}}">
              </td>
              <td class="text-black">{{ $donasi->status }}</td>
              <td>
                <a class="btn btn-info" href="{{ route('donatur.show',$donasi->id_donatur) }}"><i
                    class="fa fa-eye"></i></a>
              </td>
              <td>

                <form action="{{ route('donatur.destroy',$donasi->id_donatur) }}" method="POST">

                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                    class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
              </td>
              @endforeach
          </tbody>
        </table>
      </div>


    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="paginate">
        <div class="container">
          <div class="row">
            <div class="mx-auto">
              <div class="paginate-button col-md-12">
                {{ $donatur->links() }}
              </div>
            </div>
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