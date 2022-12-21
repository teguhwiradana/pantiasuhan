@extends('layouts.user.master')
 
@section('content')
  <!-- Team Start -->
  <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h3 class="mb-4"> KEGIATAN PANTI ASUHAN IZZATI JANNAH </h3>
            <h6 class="text-black">Kumpulan kegiatan yang dilakukan di Panti Asuhan Izzati Jannah Kota Jambi, meliputi </h6>
        </div>
        <div>
              <div class="row">
                @foreach ($data as $str)
                <div class="col-lg-4 col-sm-4">
                  
                  <div class="card mb-3">
                    @if ($str -> foto)
                    <img src="{{('storage/'.$str -> foto)}}" class="card-img-top" alt="...">
                    @else
                    <img src="{{('assets/img/kegiatanDetail/'.$str -> id.'.jpeg')}}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $str->judul }}</h5>
                      <p class="card-text">{{ $str->deskripsi }}</p>
                    </div>
                  </div>
                  
                </div>
                @endforeach
              </div>
        </div>
    </div>
</div>
<!-- Team End -->
@endsection