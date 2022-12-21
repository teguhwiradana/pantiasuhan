<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeProduk;
use Storage;
use DB; 

class TipeProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Mengambil semua isi tabel
         $tipeproduk = TipeProduk::all(); 
         $title = 'Data Tipe Produk';
         $paginate = TipeProduk::orderBy('id', 'asc')->paginate(9);
         return view('admin.pesan_kue.tipe.index', compact('tipeproduk','title','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Data Tipe Produk';
        return view('admin.pesan_kue.tipe.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
        ]);

        $tipe = new TipeProduk;
        $tipe->nama = $request->get('nama');
        $tipe->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tipe.index')
        ->with('success', 'Data Tipe Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data kue berdasarkan id produk untuk diedit
        $tipe = TipeProduk::all()->where('id', $id)->first();
        $title = 'Data Kue';
        return view('admin.pesan_kue.tipe.edit', compact('tipe','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
        ]);

        $tipe = TipeProduk::where('id',$id)->first();
        $tipe->nama = $request->get('nama');
        $tipe->save();
        
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('tipe.index')
            ->with('success', 'Data Tipe Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TipeProduk::where('id',$id)->delete();
        return redirect()->route('tipe.index')
        -> with('success', 'Tipe Produk Berhasil Dihapus');
    }
}
