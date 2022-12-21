@extends('layouts.user.master')
 
@section('content')

<!-- Team Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-4">Galeri Panti Asuhan</h1>
            </div>
            <div>
                {{-- <a class="btn btn-info" href="{{url('galeri/create')}}">Tambah</a>
             --}}
              <div class="row">
                @foreach ($data as $gambar)
                <div class="col-lg-4 col-sm-4">
                  <div class="card mb-3">
                    @if ($gambar -> gambar)
                    <img src="{{('storage/'.$gambar -> gambar)}}" class="card-img-top" alt="...">
                    @else
                    <img src="{{('/assets/img/kegiatan/'.$gambar -> id.'.jpeg')}}" class="card-img-top" alt="...">
                    @endif
                    {{-- <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div> --}}
                  </div>
                </div>
                @endforeach
              </div>
        </div>
        </div>
    </div>
    <!-- Team End -->
    @endsection