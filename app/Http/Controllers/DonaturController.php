<?php

namespace App\Http\Controllers;

use App\Models\donatur;
use App\Models\Bank;
use App\Models\program;
use Illuminate\Http\Request;
use PDF;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = program::all();
        return view('admin.donasi.donatur.pilihProgram', compact('program')); 
    }

    //PROGRAM ADMIN
    public function program(program $program)
    {
        $donatur = donatur::where('id_program', $program->id_program) -> paginate(10);
        $title = 'Data Donatur';
        return view('admin.donasi.donatur.indexDonatur', [
            'title'=>$title, 'program'=>$program ?? null, 'donatur'=>$donatur ?? null, 
        ]); 
    }
    //function cari donatur
    public function cari(Request $request, program $program)
    {
        $keyword = $request->cari;
        $donatur = donatur::where('name', 'like', '%' . $keyword . '%')->where('id_program', $program->id_program) -> paginate(5);
        $donatur->appends(['keyword' => $keyword]);
        return view('admin.donasi.donatur.indexDonatur', [
            'program'=>$program ?? null, 'donatur'=>$donatur ?? null, 
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ="Tambah Data Donatur";
        $donatur = donatur::all();
        $program = program::all();
        $bank = Bank::all();
        return view('admin.donasi.donatur.tambah', compact('title', 'donatur','program','bank'));
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
            'tgl_donasi' => 'required',
            'alamat' => 'required',
            'nominal' => 'required',
            'bukti_tf' => 'image|file|max:1024',
        ]);

        if ($request->file('bukti_tf')){
            $image_name = $request->file('bukti_tf')->store('bukti_tf', 'public');
        }

        $donatur = new donatur();
        $donatur->id_pengguna = $request->id_pengguna;
        $donatur->id_bank = $request->id_bank;
        $donatur->id_program = $request->id_program;
        $donatur->name = $request->name;
        $donatur->tgl_donasi = $request->tgl_donasi;
        $donatur->alamat = $request->alamat;
        $donatur->nominal = $request->nominal;
        $donatur->atas_nama = $request->atas_nama;
        $donatur->no_rekening = $request->no_rekening;
        $donatur->keterangan = $request->keterangan;
        // $donatur->bukti_tf = $image_name;
        $donatur->save();

        return redirect()->route('donatur.program',$donatur->id_program)->with('success', 'Data Donatur Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donatur = donatur::where('id_donatur', $id) -> first();
        $title ="Detail Data Donatur";
        return view('admin.donasi.donatur.detail', compact('title', 'donatur'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function edit($id_donatur)
    {
        // $title = new donatur;
        // $donatur = donatur::where('id_donatur', $id_donatur)->first();
        // $bank = Bank::all();
        // return view('admin.donasi.donatur.edit', compact('title', 'bank', 'donatur'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_donatur)
    {
        
       
        donatur::where('id_donatur', $id_donatur)
        ->update([
            'status' => 'masuk'
        ]);
        $donatur = donatur::where('id_donatur', $id_donatur) -> first();
        

        $donasi = donatur::where('id_program', $donatur -> id_program)->where('status', 'masuk') -> sum('nominal');
        
        $programUpdate = program::where('id_program', $donatur -> id_program) -> first();
        
        $programUpdate -> dns_terkumpul = $donasi;
        $programUpdate -> save();

        return redirect()->route('donatur.program',$donatur->id_program);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donasi = donatur::where('id_donatur', $id)->first();
        $program =  program::where('id_program', $donasi -> id_program) -> first();

        $program -> dns_terkumpul -= $donasi -> nominal;
        $program -> save();

        donatur::where('id_donatur',$id)->delete();
        return redirect()->route('donatur.program',$program->id_program)->with('success', 'Data Donatur Berhasil Dihapus');
    }

    public function cetak_pdf(program $program){
        $donatur = donatur::where('id_program', $program->id_program)->get();
        $pdf = PDF::loadview('admin.donasi.donatur.rekap.index', ['donatur'=>$donatur])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
