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
                                <h4 class="text-center text-primary">RIWAYAT PESANAN</h4>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Tanggal</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah Produk</th>
                                                <th>Harga/Produk</th>
                                                <th>Total Bayar</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($riwayat != null)
                                                @foreach ($riwayat as $item)
                                                    @if ($item->pesan->user_id == Auth::user()->id)
                                                        @if ($item->pesan->status == 'success')
                                                            <tr>
                                                                <td style="text-align:center">
                                                                    <class="text-black">{{ $loop->iteration }}
                                                                </td>
                                                                <td class="text-black">
                                                                    {{ $item->created_at->format('Y-m-d') }}</td>
                                                                <td class="text-black">{{ $item->produk->nama }}</td>
                                                                <td class="text-black">{{ $item->jumlah }}</td>
                                                                <td class="text-black">Rp
                                                                    {{ number_format($item->produk->harga) }}</td>
                                                                <td class="text-black">{{ $item->pesan->total_bayar }}</td>
                                                                <td>
                                                                    <a href="/riwayat-detail/{{ $item->id }}"
                                                                        class="btn btn-primary" title="Lihat Details"><i
                                                                            class="fas fa-eye"></i> Detail</a>

                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @else
                                                <h3>Tidak Ada Riwayat</h3>
                                            @endif
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
                                    <a href="{{ url('/produk') }}"
                                        class="btn btn-secondary rounded-pill py-2 px-4 animated slideInLeft">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Icon Boxes Section -->
    </div>

@endsection
