<?php

namespace App\Http\Controllers;
use App\Models\Pesan;
use App\Models\Produk;
use App\Models\Riwayat;
use App\Models\PesanDetail;
use App\Http\Requests\StorePesanRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdatePesanRequest;
use DateTime;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(StorePesanRequest $request)
    {
        //
        $pesan = Pesan::where('user_id', auth()->user()->id)->where('status', 'pending')->orWhere('status', 'process')->first();


        if(!empty($pesan)){
            $data = PesanDetail::where('pesan_id', $pesan->id)->orderBy('id', 'desc')->get();
            $iniTanggal = PesanDetail::where('pesan_id', $pesan->id)->first();
            return view('fitur.pesan_kue.pesan', [
                'active'=>'active',
                'title'=>'Keranjang',
                'data' => $data,
                'pesan' => $pesan,
                'total' => PesanDetail::where('pesan_id', $pesan->id)->get()->sum('total'),
                'date' => $iniTanggal
            ]);
        }else {
            Alert::warning('Maaf Keranjang anda kosong','Silahkan masukkan produk ke keranjang terlebih dahulu');
            return redirect('/produk');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePesanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesanRequest $request)
    {
        if(empty(Pesan::where('user_id', auth()->user()->id)->where('status', 'pending')->first()))
        {
            $dateTime = new DateTime();
            Pesan::insert([
                'user_id' => auth()->user()->id,
                'status' => 'pending',
                'created_at' => $dateTime->format('Y-m-d H:i:s'),
            ]);
        }
        $produk = Produk::find($request->produk_id);
        $pesan = Pesan::where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        $detailPesan = PesanDetail::where('pesan_id', $pesan->id)->where('produk_id', $produk->id)->first();


        $jumlah = $produk->harga * $request->jumlah_pesan;;

        // if($produk->tipeproduk_id == 1){
        //     if($request->jumlah_pesan % 2 == 0){
        //         $boxGenap = $request->jumlah_pesan % 4;
        //         $totalGenap = $boxGenap * $genap;
        //         $jumlah = ($produk->harga * $request->jumlah_pesan) + $totalGenap;
        //     }else{
        //         $boxGanjil = $request->jumlah_pesan / 3;
        //         $totalGanjil = $boxGanjil * $ganjil;
        //         $jumlah = ($produk->harga * $request->jumlah_pesan) + $totalGanjil;
        //     }
        // }else if($produk->tipeproduk_id == 2){
        //     $kemasan = $request->jumlah_pesan * 4000;
        //     $jumlah = ($produk->harga * $request->jumlah_pesan) + $kemasan;
        // }else{
        //  $jumlah = $produk->harga * $request->jumlah_pesan;
        // }


        $addorder = [];
        if(empty($detailPesan)){
            $addorder = [
                'pesan_id' => $pesan->id,
                'produk_id' => $request->produk_id,
                'jumlah' => $request->jumlah_pesan,
                'total' => $jumlah


            ];
            PesanDetail::create($addorder);

        }
        else{
            return redirect('/produk');
        }


        Alert::success('Berhasil', 'Berhasil ditambahkan ke keranjang');
        return redirect('/keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesanRequest  $request
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesanRequest $request, $id)
    {
        $detail = PesanDetail::where('id', $id)->first();
        $pesan = Pesan::where('id', $detail->pesan_id)->first();
        $pesan->update([
            'total_bayar' => $request->total_bayar,
        ]);
        Alert::success('Berhasil', 'Harap konfirmasi melalui Whatsapp');
        return redirect('/keranjang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanDetailId = PesanDetail::where('id', $id)->first();
        $pesanDetailId->delete();
        Alert::success('Berhasil', 'Berhasil dihapus');
        return redirect('/keranjang');
    }
}
