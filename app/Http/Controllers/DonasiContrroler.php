<?php

namespace App\Http\Controllers;

use App\Models\program;
use App\Models\binaan;
use App\Models\Bank;
use App\Models\donatur;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class DonasiContrroler extends Controller
{
    //menampilkan Daftar Program
    public function program()
    {
        $data = program::where('id_program', 1)->first();
        $paginate = program::orderBy('id_program', 'asc')->paginate(5);

        return view('fitur.donasi.donasi', compact('data', 'paginate'));
    }

    //Menampilkan Daftar Binaan
    public function binaan()
    {
        $data = binaan::all();
        $paginate = binaan::orderBy('id_binaan', 'asc')->paginate(10);
        return view('fitur.donasi.daftarbinaan', compact('data', 'paginate'));
    }

    //Mengisi FORMULIR 
    public function donasi()
    {
        return view(
            'fitur.donasi.donasi',
            ['title' => 'Donasi Panti Asuhan Putri Aisyiyah']
        );
    }

    public function form()
    {
        $program = program::all();
        $bank1 = Bank::where('nama_bank', '!=', 'Tunai');
        $bank = $bank1->where('id_bank', '!=', 4)->get();
        $donatur = donatur::all();
        return view('fitur.donasi.formulir', compact('program', 'bank', 'donatur'));
    }

    public function formulir(Request $request)
    {
        $targetProgram = program::where('nama_program', $request->id_program)->first();

        $data =  $request->validate([
            'id_bank' => 'required',
            'name' => 'required',
            'tgl_donasi' => 'required',
            'alamat' => 'required',
            'nominal' => 'required',
            'atas_nama' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'bukti_tf' => 'image|file|max:1024|required',
            'keterangan' => 'nullable'
        ]);
        $data['id_program'] = $targetProgram->id_program;

        $data['id_pengguna'] = Auth::user()->id;

        if ($request->file('bukti_tf')) {
            $data['bukti_tf'] = $request->file('bukti_tf')->store('bukti_tf', 'public');
        }

        donatur::create($data);

        $donaturUpdate = donatur::where('bukti_tf', $data['bukti_tf'])->first();

        if ($request->hide == 'on') {
            donatur::where('bukti_tf', $data['bukti_tf'])
                ->update([
                    'name' => 'Hamba Allah-' . $donaturUpdate->id_donatur
                ]);
        }

        $program = program::all();
        $bank = Bank::all();
        $donatur = donatur::all();
        Alert::success('Success', 'Donasi anda diproses oleh pihak Panti');

        return redirect('/dashboard-donasi');
    }

    //Riwayat
    public function riwayat()
    {
        // $program = program::all();
        $donatur = donatur::where('id_pengguna', Auth::user()->id)->paginate(10);
        return view('fitur.donasi.riwayat', compact('donatur'));
    }

    //LAPORAN REKAP
    public function rekap()
    {
        $program = program::all();
        return view('fitur.donasi.rekap', compact('program'));
    }
    public function rekapProgram(program $program)
    {
        $donatur = donatur::where('id_program', $program->id_program)->paginate(10);
        return view('fitur.donasi.programRekap', [
            'program' => $program ?? null, 'donatur' => $donatur ?? null,
        ]);
    }
    public function rekapCari(Request $request, program $program)
    {
        $keyword = $request->cari;
        $donatur = donatur::where('name', 'like', '%' . $keyword . '%')->where('id_program', $program->id_program)->paginate(5);
        $donatur->appends(['keyword' => $keyword]);
        return view('fitur.donasi.programRekap', [
            'program' => $program ?? null, 'donatur' => $donatur ?? null,
        ]);
    }
}
