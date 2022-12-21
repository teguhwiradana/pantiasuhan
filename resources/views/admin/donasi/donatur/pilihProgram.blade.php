@extends('layouts.admin.master')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Data Donatur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="{{route('donatur.program')}}">Dashboard</a></li> --}}
              <li class="breadcrumb-item active">Kelola Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Donatur</h3>
        </div>
          <div class="card-body">
            <div class="row">
                @foreach ($program as $p )
                @php
                $kurang = $p -> dns_butuh - $p-> dns_terkumpul;
                @endphp
                  <div class="col-sm-4">
                    <div class="card text-dark bg-light">
                      <div class="card-body">
                        <h5 class="card-title">{{$p->nama_program}}</h5>
                        <ul class="list-group list-group-flush" style="width: 18rem;">
                            <li class="list-group-item">Donasi Target : Rp.{{ number_format($p->dns_butuh) }}</li>
                            <li class="list-group-item">Donasi Kumpul : Rp.{{ number_format($p->dns_terkumpul) }}</li>
                            @if ($p->nama_program == 'Donasi Bebas')
                            <li class="list-group-item">Donasi Kurang : Rp. - </li>
                            @else
                            <li class="list-group-item">Donasi Kurang : Rp.{{ number_format($kurang) }}</li>
                            @endif  
                        </ul>
                        <a href="program-donasi/{{$p->id_program}}" class="btn btn-primary">Lihat Data</a>
                      </div>
                    </div>
                  </div>

                @endforeach
                
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
                   {{-- <div class="paginate">
                      <div class="container">
                        <div class="row">
                            <div class="mx-auto">
                                <div class="paginate-button col-md-12">
                                  {{ $program->links() }}
                                </div>
                            </div>
                          </div>
                      </div>
                  </div> --}}
          </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
 
@endsection