@extends('layouts.user.master')
 
@section('content')

<!-- ======= Frequently Asked Questions Section ======= -->
<section id="about" class="about">
      <div class="container" data-aos="fade-up">
        
      <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/produk') }}">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
                </ol>
            </nav>
       </div>

        <div class="row content">
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="swiper-slide"><img src="{{asset('storage/'.$produk->gambar)}}" width="300" height="200" class="img-fluid" alt=""></div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <div class="row" data-aos="fade-up">
                        <div class="info-box mb-70">
                            <div class="col-lg-6">
                                <form method="post" action="/keranjang" enctype="multipart/form-data">
                                    @csrf
                                <p><h2>{{$produk->nama}}</h2></p><br>

                                <h4> Harga : Rp. {{$produk->harga}}</h4>
                               <input type="hidden" name="harga" value="{{$produk->harga}}">
                               <input type="hidden" name="produk_id" value="{{$produk->id}}">
                                 
                                <p></p> <br>
                            
                                <tr>
                                        <td>Jumlah Pesanan</td>
                                        <td>:</td>
                                        <td>
                                           
                                            <input type="text" name="jumlah_pesan" class="form-control" required="">
                                            <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                          
                                        </td>
                                        
                                    </tr>
                                   
                                </form>
                                <p><p><p></p></p></p>
                              
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->
    @endsection