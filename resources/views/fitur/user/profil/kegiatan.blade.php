@extends('layouts.user.master')
 
@section('content')

  <!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-4">Kegiatan Panti Asuhan </h1>
            <h6 class="text-primary">Berikut merupakan kegiatan yang pernah dilakukan di Panti Asuhan</h6>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{asset('assets')}}/img/kegiatan/1.jpeg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Batik Celup</h4>
                        <p>Kegiatan Batik Celup di Panti Asuhan yang dilakukan oleh para santriwati </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{asset('assets')}}/img/kegiatan/fotobersama.jpeg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Foto Bersama</h4>
                        <p>Foto Bersama Pengurus Panti beserta santriwati</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{asset('assets')}}/img/kegiatan/8.jpeg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Jalan Jalan Ceria</h4>
                        <p>Kegiatan liburan yang dilakukan bersama seluruh keluarga panti </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{asset('assets')}}/img/kegiatan/9.jpeg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Jalan Jalan Ceria</h4>
                        <p>Acara bersama seluruh keluarga besar panti asuhan ke tempat liburan</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{asset('assets')}}/img/kegiatan/parenting.jpeg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Parenting</h4>
                        <p> Kegiatan sosialisasi dengan mengundang bapak ibu santriwati sehingga terjalin komunikasi yg efektif antara santriwati, orang tua dan pengurus panti</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{asset('assets')}}/img/kegiatan/10.jpeg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Penyembelihan Qurban</h4>
                        <p>Merayakan Hari Raya Idul Adha Panti asuhan menyembelih hewan kurban</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{asset('assets')}}/img/kegiatan/6.jpeg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Penerimaan Beasiswa</h4>
                        <p>Donasi berupa beasiswa pendidikan yang diberikan kepada santriwati berprestasi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{asset('assets')}}/img/kegiatan/riilah.jpeg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Rihlah dan Pelepasan Santri</h4>
                        <p>Rihlah dilakukan dalam rangka pelepasan santriwati dari panti asuhan, kegiatan ini dilaksanakan dilaksanakan dengan ceria di pantai</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{asset('assets')}}/img/kegiatan/riilah1.jpeg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <h4 class="mb-3">Rihlah dan Pelepasan Santri</h4>
                        <p>Rihlah dilakukan dalam rangka pelepasan santriwati dari panti asuhan, acara ini dilaksanakan dengan ceria di pantai</p>
                    </div>
                </div>
            </div>
            <div class="row content-center">
                <div class="col-10 col-lg-8">
                    <a href="{{url('/kegiatan-panti')}}" class="btn btn-warning rounded-pill py-2 m-3 px-4 animated slideInLeft text-white">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
@endsection