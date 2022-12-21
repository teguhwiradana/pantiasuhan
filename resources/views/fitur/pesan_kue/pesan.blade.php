@extends('layouts.user.master')

@section('content')
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/produk') }}">Produk</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>

                                @if (!empty($date->created_at))
                                    <p align="right">Tanggal Pesan : {{ $date->created_at->format('Y-m-d') }}</p>
                                @else
                                    <p align="right">Tanggal Pesan :</p>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah Produk</th>
                                                <th>Harga/Produk</th>
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                @if ($item->pesan->status == 'pending')
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if (File::exists('storage/' . $item->produk->gambar))
                                                                <img src="{{ asset('storage/' . $item->produk->gambar) }}"
                                                                    width="100" height="100" />
                                                            @elseif ($item->produk->gambar)
                                                                <img src="{{ $item->produk->gambar }}" width="100"
                                                                    height="100" />
                                                            @endif

                                                        </td>
                                                        <td>{{ $item->produk->nama }}</td>
                                                        <td>{{ $item->jumlah }}</td>
                                                        <td>Rp. {{ $item->produk->harga }} </td>
                                                        <td>Rp. {{ $item->total }}</td>
                                                        <td>
                                                            <form action="/keranjang/{{ $item->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Anda yakin akan menghapus data ?');"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @elseif ($item->pesan->status == 'process')
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if (File::exists('storage/' . $item->produk->gambar))
                                                                <img src="{{ asset('storage/' . $item->produk->gambar) }}"
                                                                    width="100" height="100" />
                                                            @elseif ($item->produk->gambar)
                                                                <img src="{{ $item->produk->gambar }}" width="100"
                                                                    height="100" />
                                                            @endif

                                                        </td>
                                                        <td>{{ $item->produk->nama }}</td>
                                                        <td>{{ $item->jumlah }}</td>
                                                        <td>Rp. {{ $item->produk->harga }} </td>
                                                        <td>Rp. {{ $item->total }}</td>
                                                        <td>
                                                            <form action="/keranjang/{{ $item->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Anda yakin akan menghapus data ?');"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach


                                            <tr>
                                                <td colspan="5" align="right"><strong>Total Bayar :</strong></td>

                                                @if ($date->pesan->status == 'process')
                                                    <td><strong>Rp. {{ number_format($date->pesan->total_bayar) }}</strong></td>
                                                    <form action="/bayar" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="total_bayar"
                                                            value="{{ $date->pesan->total_bayar }}" />
                                                        <td>

                                                            @if (!empty($date->pesan_id))
                                                                <input type="hidden" name="pesan_id"
                                                                    value="{{ $date->pesan_id }}">
                                                            @else
                                                                <input type="hidden" name="pesan_id" value="">
                                                            @endif


                                                            <button type="submit" class="btn btn-success"
                                                                onclick="return confirm('Anda yakin akan Check Out ?');">
                                                                <i class="fa fa-shopping-cart"></i> Check Out
                                                            </button>



                                                        </td>
                                                    </form>
                                                @elseif ($date->pesan->status == 'pending')
                                                <td><strong>Rp. {{ $total }}</strong></td>
                                                <form action="{{ route('keranjang.update', $date->id) }}" method="POST" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="total_bayar"
                                                        value="{{ $total }}" />
                                                    <td>

                                                        @if (!empty($date->pesan_id))
                                                            <input type="hidden" name="pesan_id"
                                                                value="{{ $date->pesan_id }}">
                                                        @else
                                                            <input type="hidden" name="pesan_id" value="">
                                                        @endif

                                                        @if (!empty($date->pesan->total_bayar))
                                                            <p><b>*Harap Konfirmasi Melalui Whatsapp*</b></p>
                                                        @else
                                                        <button type="submit" class="btn btn-success">
                                                            Konfirmasi
                                                        </button>
                                                        @endif




                                                    </td>
                                                </form>
                                                @endif



                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <B>NB:</B>
                                <p>- Total Harga <B>BELUM termasuk biaya kemasan</B></p>
                                <p>- Sebelum melakukan pembayaran, silahkan klik button <B>Konfirmasi</B></p>
                                <p>- Lalu, hubungi <B>WhatsApp</B> berikut untuk
                                    <B>konfirmasi tambahan biaya kemasan</B>
                                </p>
                                <a target="_blank" href="https://wa.link/0r016t" class="btn btn-success"><i
                                        class="fa fa-comments"></i> WhatsApp</a>
                                <br><br>
                                <p>- Jika ingin menambahkan pesanan silahkan kembali menambahkan produk kedalam keranjang
                                </p>
                                <a href="{{ url('/produk') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i>
                                    Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section><!-- End Frequently Asked Questions Section -->
@endsection
