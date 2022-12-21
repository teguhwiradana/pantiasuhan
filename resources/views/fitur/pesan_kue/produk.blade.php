@extends('layouts.user.master')

@section('content')


<section id="why-us" class="why-us">
        <div class="container">
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col">
                            <a href="/keranjang" class="nav-item nav-link"><i class="fas fa-shopping-cart"
                                style="font-size: 1.8em"></i>
                                Keranjang
                            </a>
                        </div>
                        <div class="col">
                            <div style="float: right">

                                <a href="/riwayat" class="nav-item nav-link"><i class="fas fa-file-alt"
                                    style="font-size : 1.8em"></i>
                                    Riwayat
                                </a>
                            </div>
                        </div>
                    </div>







                    <div class="section-title">
                        <span>Produk</span>
                        <h2>Produk</h2>
                        <p>Berbagai macam produk kami sediakan mulai dari jenis kue dengan berbagai macam ukuran, nasi dan tumpeng</p>
                        <p>Saudara dapat melakukan pemesanan via WhatsApp dengan nomor berikut <a href="https://wa.link/0r016t">0813-3440-1911</a></p>
                    </div>

                    <!-- Cari Produk -->
                    <form class="form" method="get" action="{{ route('produk.cari') }}">
                      <div class="form-group w-100 mb-3">
                          <label for="search" class="d-block mr-2"><strong>Cari Produk Disini</strong></label>
                          <input type="text" name="cari" class="form-control w-50 d-inline" id="cari" placeholder="Nama kue/nasi/tumpeng">
                          <button type="submit" class="btn btn-warning mb-1"><i class="fa fa-search"></i>Cari</button>
                      </div>
                    </form>

                    <!-- List Produk -->

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Kue</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Nasi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Tumpeng</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                            @forelse ($data as $d)
                            @if ($d->tipeproduk_id == 1)

                                <div class="col-lg-4" data-aos="fade-up">
                                    <div class="box">
                                        <span>{{$d->nama}}</span>
                                        @if (File::exists(public_path('storage/'.$d->gambar)))
                                        <img src="{{asset('storage/'.$d->gambar)}}" width="300" height="250"><br><br>
                                        @elseif($d->gambar)
                                        <img src="{{asset($d->gambar)}}" width="300" height="250"><br><br>
                                        @endif

                                        <h5>Harga: Rp. {{$d->harga}}</h5>
                                        <a class="btn btn-primary btn-sm" href="{{ route('produk.show',$d->id) }}">Detail</a>
                                    </div>
                                </div>

                            @endif
                            @empty
                            <h3>Tidak ada Data</h3>

                            @endforelse
                        </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                @forelse ($data as $d)
                                @if ($d->tipeproduk_id == 2)

                                    <div class="col-lg-4" data-aos="fade-up">
                                        <div class="box">
                                            <span>{{$d->nama}}</span>
                                            <img src="{{asset('storage/'.$d->gambar)}}" width="300" height="250"><br><br>
                                            <h5>Harga: Rp. {{$d->harga}}</h5>
                                            <a class="btn btn-primary btn-sm" href="{{ route('produk.show',$d->id) }}">Detail</a>
                                        </div>
                                    </div>

                                @endif
                                @empty
                                <h3>Tidak ada Data</h3>

                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                @forelse ($data as $d)
                                @if ($d->tipeproduk_id == 3)
                                    <div class="col-lg-4" data-aos="fade-up">
                                        <div class="box">
                                            <span>{{$d->nama}}</span>
                                            <img src="{{asset('storage/'.$d->gambar)}}" width="300" height="250"><br><br>
                                            <h5>Harga: Rp. {{$d->harga}}</h5>
                                            <a class="btn btn-primary btn-sm" href="{{ route('produk.show',$d->id) }}">Detail</a>
                                        </div>
                                    </div>

                                @endif
                                @empty
                                <h3>Tidak ada Data</h3>

                                @endforelse
                            </div>
                        </div>
                      </div>

                </div>
            </section>
        </div>
</section>

  @endsection
