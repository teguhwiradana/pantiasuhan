<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\TipeProduk;
use Storage;
use DB; 

class KueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua isi tabel
        $produk = Produk::all();
        $tipeproduk = DB::table('tipeproduk')->get(); 
        $title = 'Data Kue';
        $paginate = Produk::orderBy('id', 'asc')->paginate(9);
        return view('admin.pesan_kue.produk.index', compact('produk','title','tipeproduk','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Data Kue';
        $tipeproduk = TipeProduk::all();
        return view('admin.pesan_kue.produk.create', compact('title','tipeproduk'));
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
            'gambar' => 'required',
            'harga' => 'required',
            'tipeproduk' => 'required',
        ]);

        $kue = new Produk;
        $kue->nama = $request->get('nama');
        if ($request->file('gambar')){
            $image_name = $request->file('gambar')->store('images', 'public');
        }
        $kue->gambar = $image_name;
        $kue->harga = $request->get('harga');
        $tipeproduk = new TipeProduk;
        $tipeproduk->id = $request->get('tipeproduk');
        $kue->tipeproduk()->associate($tipeproduk);
        $kue->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('kue.index')
        ->with('success', 'Data Produk Berhasil Ditambahkan');
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
        $kue = Produk::where('id', $id)->first();
        return view('admin.pesan_kue.produk.edit', [
            'title' => 'Data Kue',
            'tipeproduk' => TipeProduk::all(),
            'kue' => $kue
        ]);
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
            'gambar' => 'required',
            'harga' => 'required',
            'tipeproduk' => 'required',
        ]);

        $kue = Produk::where('id',$id)->first();
        $kue->nama = $request->get('nama');
        if ($kue->gambar && file_exists(storage_path('app/public/'.$kue->gambar))){
            Storage::delete('public/'. $kue->gambar);
        }

        $tipeproduk = new TipeProduk;
        $tipeproduk->id = $request->get('tipeproduk');

        $image_name = $request->file('gambar')->store('images', 'public');
        $kue->gambar = $image_name;
        $kue->harga = $request->get('harga');
        
        $kue->tipeproduk()->associate($tipeproduk);
        $kue->save();
        

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('kue.index')
            ->with('success', 'Data Produk Berhasil Diupdate');
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
        Produk::where('id',$id)->delete();
        return redirect()->route('kue.index')
        -> with('success', 'Produk Berhasil Dihapus');
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $paginate = Produk::where('nama', 'like', '%' . $keyword . '%')->paginate(3);
        $paginate->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Kue';
        return view('admin.pesan_kue.produk.index', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
