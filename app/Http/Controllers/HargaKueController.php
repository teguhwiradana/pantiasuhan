<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harga;
use App\Models\Produk;
use DB;

class HargaKueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua isi tabel
        $harga = Harga::all(); 
        $produk = DB::table('produk')->get();
        $title = 'Data Harga Kue';
        $paginate = Harga::orderBy('id', 'asc')->paginate(5);
        return view('admin.pesan_kue.harga.index', compact('harga','produk','title','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Data Harga';
        $produk = Produk::all();
        return view('admin.pesan_kue.harga.create', compact('title','produk'));
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
            'produk_id' => 'required',
            'harga_normal' => 'required',
            'harga_tanggung' => 'required',
            'harga_mini' => 'required',
        ]);

        $harga = new Harga;
        $harga->harga_normal = $request->get('harga_normal');
        $harga->harga_tanggung = $request->get('harga_tanggung');
        $harga->harga_mini = $request->get('harga_mini');

        $produk = new Produk;
        $produk->id = $request->get('produk_id');

        $harga->produk()->associate($produk);
        $harga->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('harga.index')
        ->with('success', 'Data Harga Kue Berhasil Ditambahkan');

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
        //menampilkan detail data harga kue berdasarkan id harga untuk diedit
        $harga = Harga::all()->where('id', $id)->first();
        $produk = Produk::all();
        $title = 'Data Harga Kue';
        return view('admin.pesan_kue.harga.edit', compact('harga','produk','title'));
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
            'produk_id' => 'required',
            'harga_normal' => 'required',
            'harga_tanggung' => 'required',
            'harga_mini' => 'required',
        ]);

        $harga = Harga::with('produk')->where('id',$id)->first();
        $harga->harga_normal = $request->get('harga_normal');
        $harga->harga_tanggung = $request->get('harga_tanggung');
        $harga->harga_mini = $request->get('harga_mini');

        $produk = new Produk;
        $produk->id = $request->get('produk_id');

        $harga->produk()->associate($produk);
        $harga->save();
        
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('harga.index')
            ->with('success', 'Data Harga Kue Berhasil Diupdate');
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
        Harga::where('id',$id)->delete();
        return redirect()->route('harga.index')
        -> with('success', 'Harga Kue Berhasil Dihapus');
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $paginate = Harga::with('produk')->where('produk_id', 'like', '%' . $keyword . '%')->paginate(3);
        $paginate->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Harga Kue';
        return view('admin.pesan_kue.harga.index', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
