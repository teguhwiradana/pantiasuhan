@extends('layouts.admin.master')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Profil Umum</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4 col-sm-12">
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$jumlah_galeri}}</h3>
  
                    <h5>Galeri</h5>
                      <p>- Galeri Panti -</p>
                      <p></p>
                    </div>
                  <div class="icon">
                    <i class="bi bi-images"></i>
                  </div>
                  <a href="{{route('galeri.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
  
                <div class="col-lg-4 col-sm-12">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$jumlah_kegiatan}}</h3>
                      <h5>Kegiatan Panti</h5>
                      <p>- Kegiatan Panti -</p>
                      <p></p>
                    </div>
                    <div class="icon">
                      <i class="bi bi-house-fill"></i>
                    </div>
                  <a href="{{route('kegiatan.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
  
                <div class="col-lg-4 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{$jumlah_struktur}}</h3>
  
                      <h5>Struktur Kepengurusan</h5>
                      <p>-Struktur kepengurusan panti-</p>
                    </div>
                    <div class="icon">
                      <i class="bi bi-diagram-3"></i>
                    </div>
                    <a href="{{route('struktur.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Donasi</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <div class="inner">
                      <h3>{{$jumlah_binaan}}</h3>

                      <h5>Binaan</h5>
                      <p>- Donasi terkumpul saat ini -</p>
                    </div>
                    <div class="icon">
                      <i class="bi bi-person-fill"></i>
                    </div>
                    <a href="{{route('binaan.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{$jumlah_bank}}</h3>

                      <h5>Bank</h5>
                      <p>- Bank tersedia saat ini -</p>
                    </div>
                    <div class="icon">
                       <i class="bi bi-wallet"></i>
                    </div>
                    <a href="{{route('bank.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <div class="inner">
                      <h3>{{$jumlah_program}}</h3>

                      <h5>Program</h5>
                      <p>- Program tersedia saat ini -</p>
                    </div>
                    <div class="icon">
                      <i class="bi bi-menu-button-wide-fill"></i>
                    </div>
                    <a href="{{route('program.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-sm-12">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>{{$jumlah_donatur}}</h3>

                      <h5>Donatur</h5>
                      <p>- Donatur saat ini -</p>
                    </div>
                    <div class="icon">
                      <i class="bi bi-person"></i>
                    </div>
                    <a href="{{route('donatur.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-12 col-sm-12">
                  <div class="small-box bg-secondary">
                    <div class="inner">
                      <h3>Data Program</h3>
                      <div class="table-responsive">
                        <table class="table caption-top">
                          <thead>
                            <tr>
                              <th scope="col">Nama Program</th>
                              <th scope="col">Donasi Butuh</th>
                              <th scope="col">Donasi Kurang</th>
                              <th scope="col">Donasi Terkumpul</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($program as $pgr)
                            @php
                                $kurang = $pgr -> dns_butuh - $pgr -> dns_terkumpul;
                              @endphp
                            <tr>
                              <td class="text-black">{{ $pgr->nama_program}}</td>
                              @if ($pgr->nama_program == 'Donasi Bebas')
                              <td class="text-black" ><i class="bi bi-infinity"></i></td>
                              <td class="text-black">Rp -</td>
                               @else
                               <td class="text-black">Rp.{{ number_format($pgr->dns_butuh) }}</td>
                               <td class="text-black">Rp.{{ number_format($kurang) }}</td>
                              @endif  
                              <td class="text-black">Rp. {{ number_format($pgr->dns_terkumpul) }}</td>
                              <td class="text-black">{{ $pgr->status }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="card">
            <div class="card-header">
              <h3 class="card-title">Catering</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4 col-sm-12">
                  
                  <div class="small-box bg-primary">
                    <div class="inner">
                      <h3>{{$produk}}</h3>

                      <h4>Produk</h4>
                      <p>- kue,nasi,tumpeng -</p>
                    </div>
                    <div class="icon">
                      <i class="bi bi-bag"></i>
                    </div>
                    <a href="{{route('kue.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                  
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$pesanan}}</h3>

                      <h4>Pesanan Kue</h4>
                      <p>- Pesanan keseluruhan -</p>
                      <p></p>
                    </div>
                    <div class="icon">
                      <i class="bi bi-card-list"></i>
                    </div>
                    <a href="{{route('pesan.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-sm-12">
                  
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>Rp. {{$pendapatan}}</h3>

                      <h4>Pendapatan</h4>
                      <p>- Pendapatan keseluruhan -</p>
                      <p></p>
                    </div>
                    <div class="icon">
                      <i class="bi bi-cash-stack"></i>
                    </div>
                    <a href="{{url('/form')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection