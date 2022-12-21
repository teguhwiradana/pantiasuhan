@extends('layouts.user.master')

@section('content')
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="container">
                <div class="row mt-4 mb-2">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/produk') }}" class="text-primary">Produk</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/keranjang') }}"
                                        class="text-primary">Keranjang</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <a href="{{ url('/keranjang') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                </div>

                <div class="row mt-4">
                    <form action="/checkout/{{ $details->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col">
                            <h4 class="mb-5">Pilih metode pembayaran!</h4>
                            @error('payment')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="row">
                                @foreach ($bank as $b)
                                    <div class="col mb-4 align-self-center">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <label class="form-check-label "
                                                        for="exampleRadios{{ $loop->iteration }}">
                                                        @if (File::exists(public_path('storage/' . $b->gambar)))
                                                        <img src="{{ asset('storage/' . $b->gambar) }}" alt=""
                                                        height="100px" style="object-fit: fill;border-radius: 20px;"
                                                        class="img-target">
                                                        @elseif($b->gambar)
                                                        <img src="{{ asset($b->gambar) }}" alt=""
                                                        height="100px" style="object-fit: fill;border-radius: 20px;"
                                                        class="img-target">
                                                        @endif
                                                    </label>
                                                    <input class="form-check-input d-none opt-radio" type="radio"
                                                        name="bank_id" id="exampleRadios{{ $loop->iteration }}"
                                                        value="{{ $b->id_bank }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            <p>Untuk pembayaran silahkan dapat transfer di rekening yang anda pilih : <strong> Rp.
                                    {{ number_format($pesan->total_bayar) }}</strong> </p>
                            <div class="accordion" id="accordionExample">
                                @foreach ($bank as $b)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false"
                                                aria-controls="collapse{{ $loop->iteration }}">
                                                {{ $b->nama_bank }}
                                                @if (File::exists(public_path('storage/' . $b->gambar)))
                                                    <img src="{{ asset('storage/' . $b->gambar) }}" alt=""
                                                        width="75px">
                                                @elseif($b->gambar)
                                                    <img src="{{ asset($b->gambar) }}" alt="" width="75px">
                                                @endif

                                            </button>
                                        </h2>
                                        <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $loop->iteration }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li>No Rekening : {{ $b->norekening }}</li>
                                                    <li>Atas nama : {{ $b->nama_rekening }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col">
                            <h4>Informasi Pembayaran</h4>

                            <p> 1. Pilih Bank <br>
                                2. Lakukan pembayaran melalui ATM Bank yang dipilih. <br>
                                3. Pilih menu Transaksi Lain. <br>
                                4. Pilih menu Pembayaran. <br>
                                5. Pilih menu Lainnya. <br>
                                6. Pilih menu transfer. <br>
                                7. Silahkan Upload Bukti Pembayaran <br>
                            </p>

                            <hr>


                            <div class="form-group">
                                <label for="">Upload Bukti Transfer</label>
                                <input id="gambar" type="file" name="bukti_pembayaran"
                                    class="form-control @error('gambar')  is-invalid @enderror" wire:model="gambar"
                                    value="" autocomplete="name" autofocus>

                                @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i>
                                Checkout </button>
                    </form>
                </div>
            </div>
        </div>


        </div>
    </section><!-- End Frequently Asked Questions Section -->

    <script>
        const radio = document.querySelectorAll('.opt-radio');
        const target = document.querySelectorAll('.img-target');

        radio.forEach(function(item, index) {
            item.addEventListener('click', function() {
                target.forEach(function(item, index) {
                    item.style.backgroundColor = 'white';
                    item.style.transform = 'scale(1)';
                });
                target[index].style.backgroundColor = 'rgba(0,0,0,0.08)';
                target[index].style.transform = 'scale(1.2)';
            });
        });
    </script>
@endsection
