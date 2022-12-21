<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class updatePenggunaAll extends Controller
{
    public function ubahPengguna(Request $request, $id){
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'role' => 'required',
        ]);

        $pengguna = Pengguna::where('id', $id) -> first();
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->password = $request->password;
        $pengguna->alamat = $request->alamat;
        $pengguna->nohp = $request->nohp;
        $pengguna->role = $request->role;
        $pengguna->save();

        return redirect()->route('pengguna.index')->with('success', 'Data Pengguna Berhasil Diupdate');
    }
}
