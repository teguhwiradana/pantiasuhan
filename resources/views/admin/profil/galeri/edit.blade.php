@extends('layouts.admin.master')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data Galeri </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Kelola Data Galeri</li>
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
                    <form method="post" action="{{ route('galeri.update', $galeri->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            
                            <img class="img-preview mb-3 w-100" style="border-radius: 20px;">
                                            <input type="file" class="form-control" id="photo" placeholder="Photo"
                                                name="gambar" required onchange="previewImage()" />
                        </div>
                        <a class="btn btn-secondary " href="{{ route('galeri.index') }}">Kembali</a>
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
    <script>
      function previewImage(){
                          const image = document.querySelector('#photo');
                          const imgPreview = document.querySelector('.img-preview');
                
                          imgPreview.style.width = '150px';
                
                          const oFReader = new FileReader();
                          oFReader.readAsDataURL(image.files[0]);
                
                          oFReader.onload = function(oFREvent){
                            imgPreview.src = oFREvent.target.result;
                          }
                        }
                
                        document.addEventListener('trix-file-accept', function(e){
                          e.preventDefault()
                        })
  </script>
@endsection