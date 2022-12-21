@extends('layouts.user.master')
@section('content') 
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h2 class="mb-4 text-primary" >Laporan Donasi Program {{$program->nama_program}} </h2>
        </div>
        <form class="form" method="get" action="{{route('rekapProgram.cari',$program->id_program)}}">
            <div class="form-group w-100 mb-3">
                <h5 for="search" class="d-block mr-2">Pencarian Riwayat Donasi</h5>
                <input type="text" name="cari" class="form-control w-50 d-inline" id="cari" placeholder="Nama Donatur">
                <button type="submit" class="btn btn-success mb-1"><i class="bi bi-search"></i></button>
            </div>
        </form>
        <div class="table-responsive">
          <table class="table table-Info table-striped">
            <thead>
              <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama </th>
                <th scope="col">Tanggal </th>
                <th scope="col">Nominal</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($donatur as $d)
                <tr>
                    <td><class="text-black">{{$loop->iteration}}</td>
                    <td class="text-black">{{$d->name}}</td>
                    <td>{{ $d->created_at->format('d-m-Y')}}</td>
                    <td>Rp.{{ number_format($d->nominal) }}</td>
                    <td>{{$d->status}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div> 
          <div class="paginate">
            <div class="container">
              <div class="row">
                <div class="mx-auto">
                  <div class="paginate-button col-md-12">
                    {{ $donatur->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection