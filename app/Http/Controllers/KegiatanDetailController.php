<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;

class KegiatanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        $title = 'Data Kegiatan';
        $paginate = Kegiatan::orderBy('id', 'asc')->paginate(5);

        return view(
            'admin.profil.kegiatan.index',
            compact('kegiatan', 'title', 'paginate')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Data Kegiatan";
        $kegiatan = Kegiatan::all();
        return view('admin.profil.kegiatan.tambah', compact('title', 'kegiatan'));
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
            'foto' => 'image|file|max:1024|required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->file('foto')) {
            $image_name = $request->file('foto')->store('foto', 'public');
        }

        $kegiatan = new Kegiatan();
        $kegiatan->foto = $image_name;
        $kegiatan->judul = $request->judul;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan Berhasil Ditambahkan');
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
        $title = 'Edit Data Kegiatan';
        $kegiatan = Kegiatan::find($id);
        return view('admin.profil.kegiatan.edit', compact('title', 'kegiatan'));
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

        ///melakukan validasi data
        $request->validate([
            'foto' => 'image|file|max:1024|required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $kegiatan = Kegiatan::where('id', $id)->first();
        if ($kegiatan->foto && file_exists(storage_path('app/public/' . $kegiatan->foto))) {
            Storage::delete('public/' . $kegiatan->foto);
        }
        $image_name = $request->file('foto')->store('images', 'public');

        $kegiatan->foto = $image_name;
        $kegiatan->judul = $request->get('judul');
        $kegiatan->deskripsi = $request->get('deskripsi');
        $kegiatan->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('kegiatan.index')
            ->with('success', 'Data Kegiatan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $kegiatan->delete();
        Kegiatan::where('id', $id)->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan Berhasil Dihapus');
    }
    public function cari(Request $request)
    {
        // $keyword = $request->cari;
        // $paginate = Kegiatan::where('judul', 'like', '%' . $keyword . '%')->paginate(3);
        // $paginate->appends(['keyword' => $keyword]);
        // $title = 'Pencarian Data Kegiatan';
        // return view('admin.profil.kegiatan.index', compact('paginate', 'title'))->with('i', (request()->input('page', 1) - 1) * 5);

        $keyword = $request->cari;
        $target = Kegiatan::where('judul', 'like', '%' . $keyword . '%')->paginate(3);
        $title = 'Pencarian Data Kegiatan';
        return view('admin.profil.kegiatan.index', [
            'kegiatan' => $target,
            'title' => $title,
            'paginate' => $target
        ]);
    }
}
