@extends('layouts.admin.master')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data Kue</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Kelola Data Produk</li>
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
                  <a class="btn btn-primary" href="{{ route('kue.create')}}">Tambah Produk</a> 
                    <br><br>

                    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                        <p>{{ $message }}</p>
                      </div>
                    @endif

                  <form class="form" method="get" action="{{ route('kue.cari') }}">
                      <div class="form-group w-100 mb-3">
                          <label for="search" class="d-block mr-2">Pencarian Data Produk</label>
                          <input type="text" name="cari" class="form-control w-50 d-inline" id="cari" placeholder="Nama Produk">
                          <button type="submit" class="btn btn-success mb-1">Cari</button>
                      </div>
                  </form>
                  <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                          <th>Nama Produk</th>
                          <th>Tipe Produk</th>
                          <th>Gambar</th>
                          <th>Harga</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($paginate as $kue)
                              <tr>
                                  <td>{{ $kue->nama }}</td>
                                  <td>{{ $kue->tipeproduk->nama }}</td>
                                  <td><img width="150px" height="150px" src="{{asset('storage/'.$kue->gambar)}}"></td>
                                  <td>Rp. {{ $kue->harga }}</td>
                                  <td>
                                    <a class="btn btn-warning" href="{{ route('kue.edit',$kue->id) }}"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('kue.destroy',$kue->id) }}" method="POST">
                                      
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger"  onclick="return confirm('Anda yakin akan menghapus data ini?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                  </td>
                              </tr>
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
                                {{ $paginate->links() }}
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