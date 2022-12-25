@extends('layouts.user.master')
 
@section('content')
  <!-- Team Start -->
  <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h2 class="mb-4">Daftar Binaan Panti Asuhan</h2>
            <!-- <h6 class="text-black">Pengurus yang berada dalam susunan kepengurusan Panti Asuhan Izzati Jannah memiliki tugas sebagai berikut</h6> -->
        </div>
        <div>
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">Nama Binaan</th>
                        <th style="text-align: center">Tanggal lahir</th>
                        <th style="text-align: center">Jenis Kelamin</th>
                        <th style="text-align: center">Pendidikan</th>
                        <th style="text-align: center">Umur</th>
                        <th style="text-align: center">Kelas</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Domisili</th>
                        {{-- <th colspan="2">Edit</th> --}}
    
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($binaan as $str)
                      <tr>
                      <td class="text-black" style="text-align: center">{{ $str->nama_binaan}}</td>
                      <td class="text-black" style="text-align: center">{{ $str->ttl }}</td>
                      <td class="text-black" style="text-align: center">{{ $str->jekel }}</td>
                      <td class="text-black" style="text-align: center">{{ $str->pendidikan }}</td>
                      <td class="text-black" style="text-align: center">{{ $str->umur }}</td>
                      <td class="text-black" style="text-align: center">{{ $str->kelas }}</td>
                      <td class="text-black" style="text-align: center">{{ $str->status }}</td>
                      <td class="text-black" style="text-align: center">{{ $str->domisili }}</td>
                      @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
    
    </div>
</div>
<!-- Team End -->
@endsection