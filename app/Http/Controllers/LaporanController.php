<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Binaan;
use App\Models\Kegiatan;
use PDF;

class LaporanController extends Controller
{
    public function donasi(){
        $data = Program::all();

        $pdf = PDF::loadview('admin.donasi.laporan.donasi-pdf',compact(['data']));
        // dd($data);

        return $pdf->stream('donasi.pdf');
    }
    public function binaan(){
        $data = Binaan::all();

        $pdf = PDF::loadview('admin.donasi.laporan.anak-asuh-pdf',compact(['data']));
        // dd($data);

        return $pdf->stream('binaan.pdf');
    }
    public function kegiatan(){
        $data = Kegiatan::all();

        $pdf = PDF::loadview('admin.donasi.laporan.kegiatan-pdf',compact(['data']));
        // dd($data);

        return $pdf->stream('kegiatan.pdf');
    }
}
