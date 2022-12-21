@extends('layouts.user.master')

@section('content')
 
 <!-- Carousel Start -->
 <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative" data-dot="<img src='{{asset('assets')}}/img/carousel-1.jpg'>">
          <img src="assets/img/logo.png" align="top"class="img-fluid mx-1 " alt="" style="width:150px;height:150px;">
          <img class="img-fluid" src="{{asset('assets')}}/img/bg.jpg" alt="">
            <div class="owl-carousel-inner">
              {{-- <img src="assets/img/logo.png" align="top"class="img-fluid mx-1 " alt="" style="width:150px;height:150px;"> --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-lg-8 text-center">
                            <h1 class=" text-white animated slideInDown">PANTI ASUHAN IZZATI JANNAH</h1>
                            <!-- <br></br> -->
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Selamat datang di laman resmi milik Panti Asuhan Izzati Jannah Jambi. Panti Asuhan Izzati Jannah Jambi, Danau Sipin, Jl. Masjid Nurul Jannah, RT.03/RW.01, Selamat, Kec. Jelutung, Kota Jambi merupakan salah satu amal usaha dibawah organisasi Muhammadiyah yang dalam hal ini berada dibawah naungan Pimpinan Daerah Muhammadiyah Kota Jambi.</p>
                            <a href="{{url('/profil/sejarah')}}" class="btn btn-warning rounded-pill py-3 px-5 animated slideInLeft">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- ======= Icon Boxes Section ======= --> 
<section id="icon-boxes" class="icon-boxes">
    <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
              <h4 class="title"><a href="">Al-Baqarah ayat 220</a></h4>
              <p class="description">Dan mereka bertanya kepadamu tentang anak yatim, katakalah: "Mengurus urusan mereka secara patut adalah baik, dan jika kamu bergaul dengan mereka, maka mereka adalah saudaramu; dan Allah mengetahui siapa yang membuat kerusakan dari yang mengadakan perbaikan </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <h4 class="title"><a href="">HR Bukhari</a></h4>
              <p class="description">Dari Sahl bin Sa’ad RA, berkata bahwa Rasulullah SAW bersabda: ‘Saya dan orang yang memelihara anak yatim itu dalam surga seperti ini.’ Beliau mengisyaratkan dengan jari telunjuk dan jari tengahnya serta merenggangkan keduanya.”</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <h4 class="title"><a href="">Pendidikan kerohanian</a></h4>
              <p class="description">Anak asuh Panti Asuhan Izzati Jannah Jambi mendapatkan pendidikan formal  sebagaimana pada umumnya yang dilaksanakan di sekolah masing - masing berdasarkan kemampuan mereka. Sementara pendidikan non formal difasilitasi Panti yang meliputi kegiatan kerohanian seperti pendidikan baca tulis Al Quran, Tafsir, Qiroah dan pengajian rutin  serta peningkatan keterampilan secara terjadwal</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <h4 class="title"><a href="">Paputria Catering</a></h4>
              <p class="description">Guna menunjang operasional Panti, Panti Asuhan Izzati Jannah Jambi mempunyai Usaha Unit Ekonomi Produktif di Bidang Catering. Dengan memesan kue dan nasi di Paputria Catering berarti membantu operasional Panti Izzati Jannah Jambi.</p>
            </div>
          </div>

        </div>

      </div> 
    <!-- </section>End Icon Boxes Section -->

    <!-- ======= tentang kami Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Kami</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <div class="swiper-slide"><img src="assets/img/tempat/p1.jpeg" class="img-fluid" alt=""></div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            Panti Asuhan Izzati Jannah Jambi berdiri karena belum ada panti asuhan di Danau Sipin, Jl. Masjid Nurul Jannah, RT.03/RW.01, Selamat, Kec. Jelutung, Kota Jambi. Begitu juga dinilai masih banyaknya anak yatim yang tidak tertampung dan tidak ada orangtua asuh yang menanggung, sehingga mereka tidak dapat melanjutkan sekolah. 
            </p>
            <a href="{{url('/profil/sejarah')}}"" class="btn-learn-more">Selengkapnya</a>
          </div>
        </div>

      </div>
    </section><!-- End tentang kami Section -->

    

  </main>
@endsection