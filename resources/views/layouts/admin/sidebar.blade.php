<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template')}}/dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          <small class="text-light">{{Auth::user()->jabatan}}</small>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @if(Auth::user()->jabatan == 'admin')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item "> 
            <a href="#" class="nav-link "> 
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Kelola Data Profil
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('galeri.index')}}" class="nav-link ">
                  <i class="far fa-image nav-icon"></i>
                  <p> Edit Galeri</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('kegiatan.index')}}" class="nav-link ">
                  <i class="far fa-star nav-icon"></i>
                  <p>Edit Kegiatan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('struktur.index')}}" class="nav-link ">
                  <i class="far fa-user nav-icon"></i>
                  <p>Edit Struktur</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('binaan.index')}}" class="nav-link ">
                  <i class="far fa-user nav-icon"></i>
                  <p>Data Binaan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Data Donasi -->
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Kelola Data Donasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('donatur.index')}}" class="nav-link ">
                  <i class="far fa-user nav-icon"></i>
                  <p>Data Donatur</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('program.index')}}" class="nav-link ">
                  <i class="far fa-file nav-icon"></i>
                  <p>Data Program</p>
                </a>
              </li>
            </ul>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('bank.index')}}" class="nav-link ">
                  <i class="far fa-file nav-icon"></i>
                  <p>Data Bank</p>
                </a>
              </li>
            </ul>
          </li>


          <!-- Data Catering -->
          <!-- <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Kelola Data Catering
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tipe.index')}}" class="nav-link ">
                  <i class="far fa-star nav-icon"></i>
                  <p>Data Tipe Produk</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kue.index')}}" class="nav-link ">
                  <i class="far fa-star nav-icon"></i>
                  <p>Data Produk</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pesan.index')}}" class="nav-link ">
                  <i class="far fa-star nav-icon"></i>
                  <p>Data Pesanan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/form')}}" class="nav-link ">
                  <i class="far fa-star nav-icon"></i>
                  <p>Data Pendapatan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/form-cetak-laporan')}}" class="nav-link ">
                  <i class="far fa-star nav-icon"></i>
                  <p>Cetak Pendapatan</p>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- Setting -->
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="{{url('/pengguna')}}" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          
          <!-- Logout -->
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="far fa-circle nav-icon"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
        @endif
        @if(Auth::user()->jabatan == 'direktur'|| (Auth::user()->jabatan == 'sekretaris')|| (Auth::user()->jabatan == 'bendahara'))    
        <ul class="nav nav-treeview">

          <li class="nav-item "><a class="nav-link" href="/dashboard"><i class="far fa-circle nav-icon"></i> Dashboard</a></li>
          <li class="nav-item "><a class="nav-link" href="{{route('laporan.kegiatan')}}"><i class="far fa-circle nav-icon"></i> Laporan Kegiatan</a></li>
          <li class="nav-item "><a class="nav-link" href="{{route('laporan.donasi')}}"><i class="far fa-circle nav-icon"></i> Laporan Donasi</a></li>
          <li class="nav-item "><a class="nav-link" href="{{route('laporan.binaan')}}"><i class="far fa-circle nav-icon"></i> Laporan Binaan</a></li>
          <li class="nav-item "><a class="nav-link" href="{{route('laporan.struktur')}}"><i class="far fa-circle nav-icon"></i> Laporan Sturktur</a></li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="far fa-circle nav-icon"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
        @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!--  -->