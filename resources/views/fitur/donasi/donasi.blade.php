@extends('layouts.user.master')

@section('content')

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path
      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path
      d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path
      d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
  </symbol>
</svg>

@if (session()->has('success'))
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
    <use xlink:href="#check-circle-fill" />
  </svg>
  <div>
    {{ session('success') }}
  </div>
</div>

@endif

<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="owl-carousel header-carousel position-relative">
    <div class="owl-carousel-item position-relative" data-dot="<img src='{{asset('assets')}}/img/carousel-1.jpg'>">
      <img class="img-fluid" src="{{asset('assets')}}/img/bg.jpg" alt="">
      <div class="owl-carousel-inner">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-10 col-lg-8 text-center">
              <h1 class=" text-white animated slideInDown">DONASI PANTI ASUHAN</h1>
              <p class="fs-5,5 fw-medium text-white mb-4 pb-3">Saudara, kini untuk melakukan donasi tidak perlu repot
                harus datang ke Panti Asuhan. Cukup dengan mengakses sistem ini di aplikasi pencarian anda. Sistem
                berbasis web ini memberikan kemudahan dan kenyamanan para Donatur untuk bertransaksi secara Online.

                Berikan shodaqoh/amal jariyah/donasi terbaik Saudara. InsyaAllah kenyamanan, transparansi dan
                akuntabilitas donasi Anda lebih terjamin melalui sistem donasi ini.</p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Carousel End -->


<!-- ======= Icon Boxes Section ======= -->
<div class="d-flex justify-content-center">

  <section id="icon-boxes" class="icon-boxes">
    <div class="container">
      @guest
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="row g-4">
              <div class="col-md-6 col-lg-4 wow fadeInUp " data-wow-delay="0.1s">
                <div class="service-item rounded">
                  <div class="position-relative p-4 pt-0">
                    <div class="service-icon">
                      <i class="bi bi-person-circle display-6"></i>
                    </div>
                    <h4 class="mb-3">Login Donatur</h4>
                    <p>Dengan login anda akan bisa melihat Riwayat donasi dan Daftar Binaan pada Panti Asuhan
                    </p>
                    <a class="small fw-medium" href="{{url('/login')}}">Login<i class="fa fa-arrow-right ms-2"></i></a>
                  </div>
                </div>
              </div>
              @auth
              <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded">
                  <div class="position-relative p-4 pt-0">
                    <div class="service-icon">
                      <i class="bi bi-file-earmark-text display-6"></i>
                    </div>
                    <h4 class="mb-3">Formulir Donasi </h4>
                    <p>Tanpa login anda bisa melakukan donasi dan riwayat donasi anda akan masuk ke rekap donasi
                    </p>
                    <a class="small fw-medium" href="{{url('/formulir-donasi-panti')}}">Buka Form<i
                        class="fa fa-arrow-right ms-2"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded">
                  <div class="position-relative p-4 pt-0">
                    <div class="service-icon">
                      <i class="bi bi-journal-bookmark display-6"></i>
                    </div>
                    <h4 class="mb-3">Rekap Donasi </h4>
                    <p>Laporan Donasi yang saudara lakukan telah masuk ke panti asuhan dan dapat diakses disini
                    </p>
                    <a class="small fw-medium" href="{{url('/rekap-donasi')}}">Rekap<i
                        class="fa fa-arrow-right ms-2"></i></a>
                  </div>
                </div>
              </div>
              @endauth
            </div>
          </div>
        </div>
      </div>

      @else
      <a href="{{url('/dashboard-donasi')}}"
        class="btn btn-warning rounded-pill py-3 px-5 animated slideInLeft">Formulir
        Donasi</a>
      @endguest
    </div>
    <div class="container mt-5">

      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped overflow-auto">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Nama Program</th>
              <th>Donasi yang dibutuhkan</th>
              <th>Donasi Kurang</th>
              <th>Donasi terkumpul</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($paginate as $program)
            @php
            $kurang = $program -> dns_butuh - $program -> dns_terkumpul;
            @endphp
            <tr>
              <td style="text-align:center">
                <class="text-black">{{ $loop -> iteration}}
              </td>
              <td class="text-black" style="text-align: center">{{ $program->nama_program}}</td>
              @if ($program->nama_program=='Donasi Bebas')
              <td class="text-black" style="text-align: center"><i class="bi bi-infinity"></i></td>
              <td class="text-black" style="text-align: center">Rp - </td>
              @else
              <td class="text-black" style="text-align: center">Rp {{ number_format($program->dns_butuh) }}</td>
              <td class="text-black" style="text-align: center "><b>Rp {{ number_format($kurang) }}</b></td>
              @endif
              <td class="text-black" style="text-align: center">Rp {{ number_format($program->dns_terkumpul) }}
              </td>
              </form>
              </td>
              @endforeach
          </tbody>
        </table>
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
      {{-- <div class="row">

        <div class="col-12 d-flex align-items-stretch m-auto" data-aos="fade-up">
          <div class="icon-box">

          </div>
        </div>
      </div> --}}
    </div>
  </section><!-- End Icon Boxes Section -->
</div>
@include('sweetalert::alert')
@endsection