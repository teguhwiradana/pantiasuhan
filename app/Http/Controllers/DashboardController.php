<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesan;
use App\Models\PesanDetail;
use App\Models\Riwayat;
use App\Models\Galeri;
use App\Models\Kegiatan;
use App\Models\Struktur;
use App\Models\Bank;
use App\Models\program;
use App\Models\binaan;
use App\Models\donatur;


class DashboardController extends Controller
{
    public function index (){
        $produk = Produk::all()->count();
        $pesanan= PesanDetail::all()->count();
        $pendapatan = Pesan::where('status','success')->sum('total_bayar');
        $jumlah_galeri = Galeri::all()->count();
        $jumlah_kegiatan = Kegiatan::all()->count();
        $jumlah_struktur = Struktur::all()->count();
        $jumlah_bank = Bank::all()->count();
        $jumlah_binaan = binaan::all()->count();
        $jumlah_program = program::all()->count();
        $jumlah_donatur = donatur::all()->count();
        $title = 'Dashboard';

        $program = program::all();
        $bank = Bank::all();

        return view('layouts.admin.dashboard', compact('produk','pesanan','pendapatan',
        'title','jumlah_galeri', 'jumlah_kegiatan','jumlah_struktur','jumlah_bank',
        'jumlah_binaan', 'jumlah_program','jumlah_donatur','program', 'bank'
        ));
    }
}
