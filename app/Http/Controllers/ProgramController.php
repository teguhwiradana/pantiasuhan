<?php

namespace App\Http\Controllers;

use App\Models\program;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProgramController extends Controller
{

    public function index()
    {
        $data = program::all();
        $title = 'Data Program Donasi';
        $paginate = program::orderBy('id_program', 'asc')->paginate(5);
        return view('admin.donasi.program.indexProgram', compact('data','title','paginate'));
       
    }

    public function create()
    {
        $title = 'Tambah Data Program';
        $program = new program;
        return view('admin.donasi.program.tambah', compact('title','program'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $testing = program::where('nama_program', $request -> nama_program)->first();
        $request->validate([
            'nama_program' => 'required',
            'dns_butuh' => 'required',
        ]);

        $program = new program;
        $program->nama_program = $request->nama_program;
        $program->dns_butuh = $request->dns_butuh;
        $program->dns_terkumpul = $request->dns_terkumpul;
        $program->save();

        return redirect()->route('program.index')->with('success', 'Data Program Berhasil Ditambahkan');
        
    }

    public function edit($id)
    {
        $program = program::all()->where('id_program', $id)->first();
        $title = 'Edit Data Program Donasi';
        return view('admin.donasi.program.edit', compact('program','title'));
    }

    public function update(Request $request, program $program)
    {
        $program->status = 'close';
        $program->save();   

        return redirect()->route('program.index')->with('success', 'Data Program Berhasil Diupdate');
    }

    public function ubah(Request $request, $id){
        //melakukan validasi data
        
        $request->validate([
            'nama_program' => 'required',
            'dns_butuh' => 'required',
        ]);

        $program = program::where('id_program', $id)->first();
        $program->nama_program = $request->get('nama_program');
        $program->dns_butuh = $request->get('dns_butuh');
        $program->dns_terkumpul = $request->get('dns_terkumpul');
        $program->save();
        return redirect()->route('program.index')->with('success', 'Data Program Berhasil Diupdate');
    }

    public function destroy($id)
    {
        program::where('id_program',$id)->delete();
        return redirect()->route('program.index')->with('success', 'Data Program Berhasil Dihapus');
    }
    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $paginate = program::where('nama_program', 'like', '%' . $keyword . '%')->paginate(3);
        $paginate->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Harga Kue';
        return view('admin.donasi.program.indexProgram', compact('paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
