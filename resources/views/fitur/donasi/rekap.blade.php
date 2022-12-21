@extends('layouts.user.master')
@section('content')
<!-- Service Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      <h2 class="mb-4 text-primary">LAPORAN DONASI PANTI ASUHAN </h2>
      <h6 class="text-black">Terima kasih, kepada saudara - saudara yang telah berdonasi kepada kami. Semoga donasi yang
        anda berikan bermanfaat bagi saudara kita yang membutuhkan</h6>
    </div>

    <div class="row">
      @foreach ($program as $p)
      <div class="col-sm-4">
        <div class="card m-2">
          <div class="card-body">
            <h5 class="card-title">{{$p->nama_program }}</h5>
            <p class="card-text">Donasi Program ini membutuhkan dana sebesar Rp.{{ number_format($p->dns_butuh) }}</p>
            <a href="{{ route('rekap.donasi',$p->id_program) }}" class="btn btn-primary"> Lihat</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection