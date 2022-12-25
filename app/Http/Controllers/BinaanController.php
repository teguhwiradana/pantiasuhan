<?php

namespace App\Http\Controllers;

use App\Models\binaan;
use Illuminate\Http\Request;

class BinaanController extends Controller
{

    public function index()
    {
        $binaan = binaan::all();
        $title = 'Data Binaan';
        $paginate = binaan::orderBy('id_binaan', 'asc')->paginate(5);
        return view('admin.donasi.binaan.indexBinaan', compact('binaan','title','paginate'));
    }

    public function create()
    {
        $title = 'Tambah Data Binaan';
        $binaan = new binaan;
        return view('admin.donasi.binaan.tambah', compact('title','binaan'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nama_binaan' => 'required',
            'ttl' => 'required',
            'jekel' => 'required',
            'pendidikan' => 'required',
            'umur' => 'required',
            'kelas' => 'required',
            'status' => 'required',
            'domisili' => 'required',
        ]);

        $binaan = new binaan;
        $binaan->nama_binaan = $request->nama_binaan;
        $binaan->ttl = $request->ttl;
        $binaan->jekel = $request->jekel;
        $binaan->pendidikan = $request->pendidikan;
        $binaan->umur = $request->umur;
        $binaan->kelas = $request->kelas;
        $binaan->status = $request->status;
        $binaan->domisili = $request->domisili;
        $binaan->save();

        return redirect()->route('binaan.index')->with('success', 'Data Binaan Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $binaan = binaan::all()->where('id_binaan', $id)->first();
        $title = 'Edit Data Binaan';
        return view('admin.donasi.binaan.edit', compact('binaan','title'));
    }

    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'nama_binaan' => 'required',
            'ttl' => 'required',
            'jekel' => 'required',
            'pendidikan' => 'required',
            'umur' => 'required',
            'kelas' => 'required',
            'status' => 'required',
            'domisili' => 'required',
        ]);

        $binaan = binaan::where('id_binaan',$id)->first();
        $binaan->nama_binaan = $request->get('nama_binaan');
        $binaan->ttl = $request->get('ttl');
        $binaan->jekel = $request->get('jekel');
        $binaan->pendidikan = $request->get('pendidikan');
        $binaan->umur = $request->get('umur');
        $binaan->kelas = $request->get('kelas');
        $binaan->status = $request->get('status');
        $binaan->domisili = $request->get('domisili');
        $binaan->save();
        
        return redirect()->route('binaan.index')->with('success', 'Data Binaan Berhasil Diupdate');
    }

    public function destroy($id)
    {
        binaan::where('id_binaan',$id)->delete();
        return redirect()->route('binaan.index')-> with('success', 'Data Binaan Berhasil Dihapus');
    }
    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $paginate = binaan::where('nama_binaan', 'like', '%' . $keyword . '%')->paginate(3);
        $paginate->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Daftar Binaan';
        return view('admin.donasi.binaan.indexBinaan', compact('paginate','title'))->with('i', 
        (request()->input('page', 1) - 1) * 5);
    }
    public function binaan(){
        $binaan = Binaan::all();
        return view('fitur.user.profil.binaan',compact(['binaan']));
    }
}
