@extends('layouts.admin.master')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data Tipe Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Kelola Data Tipe Produk</li>
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
                  {{-- <a class="btn btn-primary" href="{{ route('tipe.create')}}">Tambah Tipe Produk</a>  --}}

                    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                        <p>{{ $message }}</p>
                      </div>
                    @endif

                    <div class="table-responsive">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Tipe Produk</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($paginate as $tipe)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tipe->nama }}</td>
                                    <td>
                                      <form action="{{ route('tipe.destroy',$tipe->id) }}" method="POST">
                                        <a class="btn btn-warning" href="{{ route('tipe.edit',$tipe->id) }}"><i class="fa fa-edit"></i></a>
                                        @csrf
                                        {{-- @method('DELETE')
                                        <button type="submit" class="btn btn-danger"  onclick="return confirm('Anda yakin akan menghapus data ini?');"><i class="fa fa-trash"></i></button> --}}
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