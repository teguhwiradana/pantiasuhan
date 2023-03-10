@extends('layouts.admin.master')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Kelola Data Pengguna</li>
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
            <h3 class="card-title">Data Pengguna</h3>
        </div>
          <div class="card-body">
                  <a class="btn btn-primary" href="{{ route('pengguna.create') }}">Tambah Data</a> 
                    <br><br>

                    @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                        <p>{{ $message }}</p>
                      </div>
                    @endif 

                  <form class="form" method="get" action="{{route('pengguna.cari')}}">
                      <div class="form-group w-100 mb-3">
                          <label for="search" class="d-block mr-2">Pencarian Data Pengguna</label>
                          <input type="text" name="cari" class="form-control w-50 d-inline" id="cari" placeholder="Nama Pengguna">
                          <button type="submit" class="btn btn-success mb-1">Cari</button>
                      </div>
                  </form>
                  <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                          <th>No </th>
                          <th>Nama </th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>No HP</th>
                          <th>Role</th>
                          <th>Jabatan</th>
                          <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($paginate as $pgn)
                          <tr>
                          <td class="text-black" style="text-align: center" >{{ $loop -> iteration}}</td>
                          <td class="text-black">{{ $pgn->name}}</td>
                          <td class="text-black">{{ $pgn->email }}</td>
                          <td class="text-black">{{ $pgn->alamat}}</td>
                          <td class="text-black">{{ $pgn->nohp}}</td>
                          <td class="text-black">{{ $pgn->role}}</td>
                          <td class="text-black">{{$pgn->jabatan}}</td>
                          <td>
                            <form action="{{ route('pengguna.destroy',$pgn->id) }}" method="POST">
                              <a class="btn btn-warning" href="{{ route('pengguna.edit',$pgn->id) }}"><i class="fa fa-edit"></i></a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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