@extends('layouts.user.master')
 
@section('content')

 <!-- Carousel Start -->
 <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="owl-carousel header-carousel position-relative">
      <div class="owl-carousel-item position-relative" data-dot="<img src='{{asset('assets')}}/img/bg.jpg'>">
          <img class="img-fluid" src="{{asset('assets')}}/img/bg.jpg" alt="">
          <div class="owl-carousel-inner">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-10 col-lg-8 text-center">
                          <h1 class=" text-white animated slideInDown">PROFIL PANTI ASUHAN</h1>
                          <p class=" fw-medium text-white mb-4 pb-3">
                            Panti asuhan adalah suatu lembaga usaha kesejahteraan sosial yang mempunyai tanggung jawab 
                            untuk memberikan pelayanan kesejahteraan sosial kepada anak telantar dengan melaksanakan penyantunan 
                            dan pengentasan anak telantar, memberikan pelayanan pengganti fisik, mental, 
                            dan sosial pada anak asuh, sehingga memperoleh kesempatan yang luas, tepat dan memadai.
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Carousel End -->


  <main id="main">

    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
        
      <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
                <div class="icon-box">
                    <div class="d-flex justify-content-center">
                        <h4 class=""><a href="" class="text-center">Sejarah Panti Asuhan Izzati Jannah Jambi </a></h4>
                    </div>
                    <img src="{{asset('assets')}}/img/tempat/bg.jpg" style="width:100%" class="img-fluid" alt=""><br><br>
                    <p class="description">Panti Asuhan Izzati Jannah berdiri dilatar belakangi karena belum ada panti asuhan putri di Danau Sipin, Jl. Masjid Nurul Jannah, RT.03/RW.01, Selamat, Kec. Jelutung, Kota Jambi. Begitu juga dinilai masih banyaknya anak yatim yang tidak tertampung dan tidak ada orang tua asuh yang menanggung, sehingga mereka tidak dapat melanjutkan sekolah. Selain itu juga masih banyaknya anak yang tidak mampu baik secara ekonomi dan sosialnya dilihat dari tempat huniannya tidak memadai sehingga tidak layak untuk menjadi tempat tinggal untuk pertumbuhan anak, orangtua yang tidak memiliki penghasilan atau tidak memiliki pekerjaan sehingga pendidikan anak tidak terpenuhi dengan baik, begitu pula lingkungan sosial yang buruk yang di khawatirkan memberi pengaruh buruk untuk perkembangan psikologis anak. Selain itu juga bentuk pelaksaan dari perintah Allah SWT dalam QS. Al-Ma’un untuk menyantuni anak yatim.</p><br>    
                    <p class="description">
                        Dari alasan tersebut ibu-ibu yang berada dipengurusan Pimpinan Izzati Jannah dengan mengajak bapak-bapak Muhammadiyah Kota Jambi untuk mendirikan Panti Asuhan Izzati Jannah. Modal utama pendirian bangunan panti didapat dari tanah waqaf yang diberikan oleh warga Muhammadiya . Setelah terbentuk panitia maka mulailah dilakukan penggalian dana dari pusat maupun warga Muhammadiyah sekitar.
                    </p><br>
                    <!-- <p class="description">
                        Pada tahun 1995 terwujudlah Panti Asuhan Izzati Jannah yang beralamat di jalan Mayjen Haryono gang 3 no. 231a Kelurahan Dinoyo Kecamatan Lowokwaru  Kota Jambi yang pada 7 Juli 1996 diresmikan pemakaiannya oleh bapak H. Soesamto selaku Walikota Jambi, dan mendapatkan akta notaris dengan nama Notaris CH. Weltre dengan nomor notaris 467/STP/ORSOS/III/97. Panti Asuhan Izzati Jannah sudah melakukan pembaharuan akte notaris atau surat tanda pendaftaran ulang secara berkala, dan yang terbaru adalah sebagai berikut 46/07.05/02/IX/2021.  
                    </p><br> -->
                    <!-- <p class="description">
                        Penulisan sejarah ini, pertama kali ditulis oleh bapak As. Djohan Soeleiman selaku sekretaris dan disetujui oleh bapak H. R. Djoko Soelarso yang pada saat itu sebagai ketua panti pada tahun 1996.  
                    </p> -->
                </div>
              </div>
        </div>
      </div>
    </section><!-- End Icon Boxes Section -->

    

  </main><!-- End #main -->

  @endsection