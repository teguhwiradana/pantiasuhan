<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $struktur = Struktur::all();
        $title = 'Data Struktur Kepengurusan';
        $paginate = Struktur::orderBy('id', 'asc')->paginate(10);
        return view('admin.profil.struktur.indexStruktur', compact('struktur','title','paginate'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Struktur Kepengurusan';
        $struktur = new Struktur;
        return view('admin.profil.struktur.tambah', compact('title','struktur'));
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
            'name' => 'required',
            'jabatan' => 'required',
        ]);

        $struktur = new Struktur;
        $struktur->name = $request->name;
        $struktur->jabatan = $request->jabatan;
        $struktur->keterangan = $request->keterangan;
        $struktur->save();

        return redirect()->route('struktur.index')->with('success', 'Data Struktur Kepengurusan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $struktur = Struktur::find($id);
        $title = 'Edit Data Struktur Kepengurusan';
        return view('admin.profil.struktur.edit', compact('struktur','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //melakukan validasi data
         $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
        ]);

        $struktur = Struktur::find($id);
        $struktur->name = $request->name;
        $struktur->jabatan = $request->jabatan;
        $struktur->keterangan = $request->keterangan;
        $struktur->save();

        return redirect()->route('struktur.index')->with('success', 'Data Struktur Kepengurusan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $struktur = Struktur::find($id);
        $struktur->delete();
        return redirect()->route('struktur.index')->with('success', 'Data Struktur Kepengurusan Berhasil Dihapus');
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $paginate = Struktur::where('name', 'like', '%' . $keyword . '%')->paginate(3);
        $paginate->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Struktur Kepengurusan';
        return view('admin.profil.struktur.indexStruktur', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
