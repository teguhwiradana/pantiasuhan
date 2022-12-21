<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisiController extends Controller
{
    public function visi(){
        return view('fitur.user.profil.visi', 
        ['title'=> 'Visi & Misi Panti Asuhan Putri Aisyiyah']);
    }

    public function upload(){
        return view('fitur.donasi.upload', 
        ['title'=> 'Donasi Panti Asuhan Putri Aisyiyah']);
    }

    public function riwayat(){
        return view('fitur.donasi.riwayat', 
        ['title'=> 'Donasi Panti Asuhan Putri Aisyiyah']);
    }
}