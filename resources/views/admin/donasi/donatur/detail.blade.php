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
              <li class="breadcrumb-item"><a href="{{route('donatur.index')}}">Dashboard</a></li>
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
            <div class="table-responsive ">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>No Id </th>
                        <td class="text-black">{{ $donatur->id_donatur}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td class="text-black">{{ $donatur->name}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td class="text-black">{{  $donatur->created_at->format('d-m-Y | H:i:s')}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td class="text-black">{{ $donatur->alamat }}</td>
                    </tr>
                   
                    <tr>
                        <th>Nominal</th>
                        <td class="text-black">{{ $donatur->nominal }}</td>
                    </tr>
                    <tr>
                        <th>Atas Nama</th>
                        <td class="text-black">{{ $donatur->atas_nama }}</td>
                    </tr>
                    <tr>
                      <th>Nama Bank</th>
                      <td class="text-black">{{ $donatur->nama_bank }}</td>
                  </tr>
                    <tr>
                        <th>No Rekening Donatur</th>
                        <td class="text-black">{{ $donatur->no_rekening }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td class="text-black">{{ $donatur->keterangan }}</td>
                    </tr>
                    <tr>
                        <th>Bukti Transfer</th>
                        <td> <img src="{{asset('storage/'.$donatur->bukti_tf)}}" class="img-preview img-fluid mb-3 " alt=""></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $donatur->status }}</td>
                    </tr>
                    <tr>
                        <th>Proses</th>
                        <td>
                            <form action="{{ route('donatur.update',$donatur->id_donatur) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Masuk</button>
                            </form>
                        </td>
                    </tr>
                  </table>
                  <a class="btn btn-secondary " href="{{ route('donatur.program',$donatur->id_program) }}">Kembali</a>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection
@section('script')
<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection