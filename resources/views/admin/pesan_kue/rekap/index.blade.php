@extends('layouts.admin.master')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pesanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Pesanan</li>
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
                  <form class="form" method="get" action="{{ route('pesan.cari') }}">
                      <div class="form-group w-100 mb-3">
                          <label for="search" class="d-block mr-2">Pencarian Data Pesanan</label>
                          <input type="text" name="cari" class="form-control w-50 d-inline" id="cari" placeholder="Tanggal">
                          <button type="submit" class="btn btn-success mb-1">Cari</button>
                      </div>
                  </form>
                  <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Customer</th>
                              <th>Harga Kemasan</th>
                              <th>Total Bayar + Kemasan</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $item)
                          <tr>
                          <td align="center">{{ $loop->iteration }}</td>
                          <td align="center">{{ $item->created_at->format('Y-m-d') }}</td>
                          <td align="center">{{ $item->user->name }}</td>
                          <td>
                            @if ($item->kemasan == null)
                            <a href="{{ route('pesan.edit', $item->id) }}" class="btn btn-primary">Tambah</a>
                            @else
                            {{ $item->kemasan }}
                            @endif

                          </td>
                          <td class="text-black">{{ $item->total_bayar }}</td>
                          <td>
                            <a class="btn btn-warning" href="{{ route('pesan.show',$item->id) }}"><i class="fa fa-eye"></i></a>
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
