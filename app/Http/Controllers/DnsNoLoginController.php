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

class DnsNoLoginController extends Controller
{
     //Mengisi FORMULIR 
     public function donasi(){
        return view('fitur.donasi.donasi', 
        ['title'=> 'Donasi Panti Asuhan Putri Aisyiyah']);
    }
    
    public function form()
    {
        $program = program::all();
        $bank1 = Bank::where('nama_bank' , '!=', 'Tunai');
        $bank= $bank1 -> where('id_bank','!=', 4)->get();
        
        $donatur = donatur::all();
        return view('fitur.donasi.donasiTidakLogin.formulir', compact('program','bank','donatur')); 
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
            'keterangan' => 'nullable',
        ]);
        $data['id_program'] = $targetProgram->id_program;

        if ($request->file('bukti_tf')){
            $data['bukti_tf'] = $request->file('bukti_tf')->store('bukti_tf', 'public');
        }

        donatur::create($data);

        $donaturUpdate = donatur::where('bukti_tf', $data['bukti_tf'])->first();
        
       if($request -> hide == 'on'){
        donatur::where('bukti_tf', $data['bukti_tf'])
        ->update([
            'name' => 'Hamba Allah-'.$donaturUpdate->id_donatur
        ]);
       }

        $program = program::all();
        $bank = Bank::all();
        $donatur = donatur::all();
        Alert::success('Success', 'Donasi anda diproses oleh pihak Panti, Silahkan cek pada rekap donasi untuk riwayat donasi anda');

        return redirect('/donasi'); 
    }
}
