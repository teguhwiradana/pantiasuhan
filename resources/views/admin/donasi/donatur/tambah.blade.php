@extends('layouts.admin.master')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data Donatur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Kelola Data Donatur</li>
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
                    <form action="{{ route('donatur.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama </label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" >
                        </div>
                        <div class="form-group">
                            <label for="tgl_donasi">Tanggal Donasi</label>
                            <input type="date" name="tgl_donasi" class="form-control" id="tgl_donasi" aria-describedby="tgl_donasi" value="{{date('Y-m-d')}}" >
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" >
                        </div>
                        <div class="form-group">
                          <h6 class="text-black">Bank</h6>
                              <select name="id_bank" id="id_bank" class="form-select border-0" style="height: 55px;">
                                  {{-- <option selected>Bank</option> --}}
                                  @foreach ($bank as $b)
                                  <option value="{{$b->id_bank}}" >{{$b->nama_bank}} - {{$b->norekening}}</option>
                                  @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" name="nominal" class="form-control" id="nominal" aria-describedby="nominal" >
                        </div>
                        <div class="form-group">
                            <label for="atas_nama">Atas Nama</label>
                            <input type="text" name="atas_nama" class="form-control" id="atas_nama" aria-describedby="atas_nama" >
                        </div>
                        <div class="form-group">
                          <label for="nama_bank">Nama Bank</label>
                          <input type="text" name="nama_bank" class="form-control" id="nama_bank" aria-describedby="nama_bank" >
                      </div>
                        <div class="form-group">
                            <label for="no_rekening">No Rekening</label>
                            <input type="text" name="no_rekening" class="form-control" id="no_rekening" aria-describedby="no_rekening" >
                        </div>
                        <div class="form-group">
                          <h6 class="text-black">Pilih Program</h6>
                          <select name="id_program" id="nama_program" class="form-select border-0" style="height: 55px;">
                              @foreach ($program as $p)
                              <option value="{{$p->id_program}}" >{{$p->nama_program}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan" >
                        </div>
                        <div class="form-group">
                          <label for="bukti_tf">Bukti Transfer</label>
                          <img src="" class="img-preview img-fluid mb-3 " alt="">
                          <input type="file" name="bukti_tf" class="form-control border-0"
                            placeholder="Upload Bukti Transfer Donasi" style="height: 55px;" id="image" onchange="previewImage()">
                        </div>
                        {{-- <a class="btn btn-secondary " href="{{ route('donatur.program') }}">Kembali</a> --}}
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