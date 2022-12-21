@extends('layouts.user.master')
@section('content')
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Details Riwayat</h6>
                <h2 class="mt-2">Details Riwayat </h2>
            </div>
            <div class="row">
                <h3 class="text-primary mb-3"><a href="/riwayat"><i class="fas fa-arrow-left"></i> Kembali</a></h3>
                <div class="col-lg-7">
                    <div class="w-75 text-center ">
                        <table class="table table-borderless align-baseline overflow-hidden">
                            <tbody>
                                <tr>
                                    <th class="text-start">
                                        <h6>Nama Pemesan</h6>
                                    </th>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td class="text-end">
                                        <h6>{{ $details->pesan->user->name }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">
                                        <h6>Metode Pembayaran</h6>
                                    </th>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td class="text-end">
                                        <h6>
                                            <img src="{{ asset('storage/' . $details->pesan->bank->gambar) }}"
                                                alt="" width="150px">
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">
                                        <h6>Total Harga Produk</h6>
                                    </th>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td class="text-end">
                                        <h6>
                                            Rp. {{ number_format($details->total) }}
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">
                                        <h6>Produk</h6>
                                    </th>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td class="text-end">
                                        <h6>{{ $details->produk->nama }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">
                                        <h6>Tipe Produk</h6>
                                    </th>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td class="text-end">
                                        <h6>{{ $details->produk->tipeproduk->nama }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">
                                        <h6>Jumlah</h6>
                                    </th>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td class="text-end">
                                        <h6>
                                            {{ number_format($details->jumlah) }}
                                        </h6>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">
                                        <h6>Total Bayar</h6>
                                    </th>
                                    <td>
                                        <h6>:</h6>
                                    </td>
                                    <td class="text-end">
                                        <h6>
                                           Rp. {{ number_format($details->pesan->total_bayar) }}
                                        </h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-5">
                    @if (File::exists(public_path('storage/' . $details->produk->gambar)))
                        <img src="{{ asset('storage/' . $details->produk->gambar) }}" width="400" height="300"><br><br>
                    @elseif($details->produk->gambar)
                        <img src="{{ asset($details->produk->gambar) }}" width="400" height="300"><br><br>
                    @endif


                    {{-- <img src="@if (!$details->produk->gambar) {{ asset($details->produk->gambar) }}
                                                                                @else
                                                                                {{ asset('storage/' . $details->produk->gambar) }} @endif"
                        alt="" width="400px"> --}}
                    <div class="card text-center">
                        <div class="card-header">
                            Bukti Pembayaran
                        </div>
                        <div class="card-body pt-3">
                            <div class="tab-pane active fade show  profile-edit pt-3" id="profile-edit"
                                style="height: 400px">
                                <img src="{{ asset('storage/' . $details->pesan->bukti_pembayaran) }}" alt=""
                                    height="300px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
