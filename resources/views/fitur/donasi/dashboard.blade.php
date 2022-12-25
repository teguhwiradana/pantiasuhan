@extends('layouts.user.master')
@section('content')
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>

  @if (session()->has('success'))
  <div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
        {{ session('success') }}
    </div>
  </div>

@endif
  
 
  <!-- Service Start -->
  <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h2 class="mb-4 text-primary" >DONASI PANTI ASUHAN </h2>
            <h6 class="text-black"> Saudara, mari bersama-sama gotong royong untuk membantu dan memberikan senyum kebahagiaan bagi mereka. Karena kebaikan akan terasa lebih mudah jika dilakukan bersama-sama</h6>
            <h6 class="text-black">"Sesungguhnya orang-orang yang bersedekah baik laki-laki maupun perempuan dan meminjamkan kepada allah dengan pinjaman yang baik, akan dilipat gandakan (balasannya) bagi mereka; dan mereka akan mendapatkan pahala yang mulia"</h6>
            <h6 class="text-black">(QS Al Hadid ayat 18)</h6>
        </div>
        <div class="row g-4">
            {{-- <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s" >
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="/assets/img/program/1.jpg" alt=""height="100px">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Donasi Renovasi atap</h4>
                        <p>Donasi ini dikhususkan untuk merenovasi atap Panti Asuhan dengan jumlah yang dibutuhkan sebesar Rp 356 juta </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s" >
                <div class="service-item rounded overflow-hidden">
                    
                    <img class="img-fluid" src="/assets/img/program/2.jpeg" alt=""height="100px">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Donasi Bebas </h4>
                        <p>Donasi ini dikhususkan untuk donasi bebas atau selain pada program </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s" >
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="/assets/img/program/3.jpeg" alt="" height="100px">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Program Yang Akan Datang</h4>
                        <p>Program donasi ini belum tersedia</p>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="img/img-600x400-4.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="bi bi-file-earmark-text display-6"></i>
                        </div>
                        <h4 class="mb-3">Formulir Donasi</h4>
                        <a class="small fw-medium" href="{{url('/formulir-donasi')}}">Buka Form<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="bi bi-clock-history display-6"></i>
                        </div>
                        <h4 class="mb-3">Riwayat Donasi</h4>
                        <a class="small fw-medium" href="{{url('/donasi-riwayat')}}">Buka Form<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="img/img-600x400-6.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            {{-- <i class="bi bi-list-ol display-6"></i> --}}
                            <i class="bi bi-person-lines-fill display-6"></i>
                        </div>
                        <h4 class="mb-3">Daftar Binaan</h4>
                        <a class="small fw-medium" href="{{url('/daftar-binaan')}}">Buka Form<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- Service End -->
@include('sweetalert::alert')

@endsection