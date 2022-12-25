<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KegiatanDetailController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\DonasiContrroler;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BinaanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\KueController;
use App\Http\Controllers\DetailKueController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DnsNoLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BankCateringController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\RekapPesanController;
use App\Http\Controllers\TipeProdukController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\updatePenggunaAll;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('fitur.user.beranda');
});
Route::get('/beranda ',[BerandaController::class, 'beranda']);
Route::prefix('profil')->group(function () {
    Route::get('/sejarah ',[SejarahController::class, 'sejarah']);
    Route::get('/struktur-kepengurusan',[KegiatanController::class, 'struktur']);
    Route::get('/visi ',[VisiController::class, 'visi']);
    Route::get('/kegiatan ',[KegiatanController::class, 'kegiatan']);
    Route::get('/binaan',[BinaanController::class, 'binaan']);
});
Route::get('/galeri-panti',[KegiatanController::class, 'galeri']);
Route::get('/kegiatan-panti',[KegiatanController::class, 'kegiatanDetail']);

Route::get('/donasi',[DonasiContrroler::class, 'program']);
Route::get('/formulir-donasi-panti',[DnsNoLoginController::class, 'form']);
Route::post('/formulir-donasi-panti',[DnsNoLoginController::class, 'formulir']);
Route::get('/rekap-donasi',[DonasiContrroler::class, 'rekap']);
Route::get('/rekap-donasi/{program}',[DonasiContrroler::class, 'rekapProgram'])->name('rekap.donasi');
Route::get('/rekap-program/{program}/', [DonasiContrroler::class, 'rekapCari'])->name('rekapProgram.cari');


Route::resource('produk', ProdukController::class);
Route::get('produk/cari/data', [ProdukController::class, 'cari'])->name('produk.cari');

Auth::routes();
Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // ROUTE ADMIN DONASI
    Route::resource('bank', BankController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('binaan', BinaanController::class);
    Route::resource('donatur', DonaturController::class);

    Route::post('program/ubah/{id}', [ProgramController::class, 'ubah'])->name('program.ubah');
    Route::get('program/cari/data', [ProgramController::class, 'cari'])->name('program.cari');
    Route::get('bank/cari/data', [BankController::class, 'cari'])->name('bank.cari');
    Route::get('binaan/cari/data', [BinaanController::class, 'cari'])->name('binaan.cari');
    Route::get('program-donasi/{program}',[DonaturController::class, 'program'])->name('donatur.program');
    Route::get('donatur/cari/data/{program}/', [DonaturController::class, 'cari'])->name('donatur.cari');
     Route::get('donatur/cetak_pdf/{program}', [DonaturController::class, 'cetak_pdf'])->name('donatur.cetak');
    Route::get('donatur/cetak_pdf/{program}', [DonaturController::class, 'cetak_pdf'])->name('donatur.cetak');

    //ROUTE ADMIN WEB PROFIL
    Route::resource('struktur', StrukturController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('kegiatan', KegiatanDetailController::class);
    Route::get('struktur/cari/data', [StrukturController::class, 'cari'])->name('struktur.cari');
    Route::get('kegiatan/cari/data', [KegiatanDetailController::class, 'cari'])->name('kegiatan.cari');

    //ROUTE PENGGUNA
    Route::resource('pengguna', PenggunaController::class);
    Route::get('pengguna/cari/data', [PenggunaController::class, 'cari'])->name('pengguna.cari');
    Route::post('/updatePengguna/{id}', [updatePenggunaAll::class, 'ubahPengguna']);

    // ROUTE ADMIN CATERING KUE
    Route::resource('kue', KueController::class);
    Route::get('kue/cari/data', [KueController::class, 'cari'])->name('kue.cari');
    Route::resource('pesan', RekapPesanController::class);
    Route::get('pesan/cari/data', [RekapPesanController::class, 'cari'])->name('pesan.cari');

    Route::get('/form', function () {
        return view('admin.pesan_kue.rekap.form');
    });

    Route::get('/form-cetak-laporan', function () {
        return view('admin.pesan_kue.rekap.formCetak');
    });

    Route::get('pesan/pendapatan/data', [RekapPesanController::class, 'pendapatan'])->name('pesan.pendapatan');
    Route::get('pesan/cetak/data', [RekapPesanController::class, 'cetak'])->name('pesan.cetak');

    Route::resource('tipe', TipeProdukController::class);
});

Route::middleware(['auth', 'user'])->group(function (){
    // ROUTE DONASI
    Route::get('/dashboard-donasi',[KegiatanController::class, 'dashboard']);
    Route::get('/formulir-donasi',[DonasiContrroler::class, 'form']);
    Route::post('/formulir-donasi',[DonasiContrroler::class, 'formulir']);
    Route::get('/daftar-binaan',[DonasiContrroler::class, 'binaan']);
    Route::get('/donasi-upload',[VisiController::class, 'upload']);
    Route::get('/donasi-riwayat',[DonasiContrroler::class, 'riwayat']);

    // ROUTE CATERING
    Route::resource('/keranjang', PesanController::class)->only(['index', 'store', 'destroy', 'update']);
    Route::get('/bayar', [BankCateringController::class, 'index']);
    Route::post('/bayar', [BankCateringController::class, 'bayar']);
    Route::post('/checkout/{id}', [CheckOutController::class, 'store']);
    Route::get('/riwayat', [CheckOutController::class, 'riwayat']);
    Route::get('/riwayat-detail/{id}', [CheckOutController::class, 'riwayatDetail']);

});

Route::get('/produk/detail', [ProdukController::class, 'show']);


