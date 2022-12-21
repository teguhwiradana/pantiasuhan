@extends('layouts.user.master')
@section('content')
 <!-- ======= Icon Boxes Section ======= -->
 <div class="d-flex justify-content-center">
    <section id="icon-boxes" class="icon-boxes">
        <div class="container">
          <div class="row">
              <div class="col-12 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
                  <div class="icon-box">
                      <div class="d-flex justify-content-center">
                          <h4 class="text-center text-primary">RIWAYAT DONASI</h4>
                      </div>
                      <div>
                        <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Program</th>
                                <th>Tanggal Donasi</th>
                                <th>Nominal</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($donatur as $dtr)
                              <tr>
                              <td style="text-align:center"><class="text-black">{{ $loop->iteration }}</td>
                              <td class="text-black">{{ $dtr->name}}</td>
                              <td class="text-black">{{ $dtr->program->nama_program }}</td>
                              <td class="text-black">{{ $dtr->tgl_donasi }}</td>
                              <td class="text-black">Rp {{ number_format($dtr->nominal)}}</td>
                              <td class="text-black">{{ $dtr->status }}</td>
                                </form>
                              </td>  
                              @endforeach
                            </tbody>
                        </table>
                        </div>
                          {{-- <div class="paginate">
                            <div class="container">
                              <div class="row">
                                <div class="mx-auto">
                                  <div class="paginate-button col-md-12">
                                    {{ $paginate->links() }}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> --}}
                          <div class="col-12">
                                    <a href="{{url('/dashboard-donasi')}}" class="btn btn-secondary rounded-pill py-2 px-4 animated slideInLeft">Kembali</a>
                          </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </section><!-- End Icon Boxes Section -->
 </div>
@endsection