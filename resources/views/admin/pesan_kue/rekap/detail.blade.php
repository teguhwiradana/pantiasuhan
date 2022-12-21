@extends('layouts.admin.master')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data Pesanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Kelola Data Pesanan</li>
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
            <h3 class="card-title">{{ $title }}</h3>
        </div>
          <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Nama Customer</th>
                              <th>Alamat Customer</th>
                              <th>Nama Produk</th>
                              <th>Jumlah</th>
                              <th>Harga Per Produk</th>
                              <th>Total Biaya Produk</th>
                              <th>Bukti Pembayaran</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($pesanan as $item)
                          <tr>
                            <td align="center">{{ $loop->iteration }}</td>
                            <td align="center">{{ $item->created_at}}</td>
                            <td align="center">{{ $item->pesan->user->name }}</td>
                            <td align="center">{{ Auth::user()->alamat }}</td>
                            <td align="center">{{$item->produk->nama }}</td>
                            <td align="center">{{$item->jumlah}} biji</td>
                            <td align="center">Rp. {{$item->produk->harga}}</td>
                            <td align="center">Rp. {{$item->total}}</td>
                            <td align="center"><img width="250px" src="{{asset('storage/'.$item->pesan->bukti_pembayaran)}}"></td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                      &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-flat btn-warning" href="{{ route('pesan.index') }}"><i class="fa fa-arrow-left"></i> Kembali</a><br><br>
                </div>
          </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection