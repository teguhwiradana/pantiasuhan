<?php

namespace App\Http\Controllers;
use App\Models\Struktur;
use App\Models\Galeri;
use App\Models\Kegiatan;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function kegiatan(){
        return view('fitur.user.profil.kegiatan', 
        ['title'=> 'Kegiatan Panti Asuhan Putri Aisyiyah']);
    }
    //Struktur Kepngerusuan
    public function struktur(){
        $data = Struktur::all();
        return view ('fitur.user.profil.struktur',
        ['data' => $data, 
        'title'=> 'Struktuk Kepengurusan Panti Asuhan Putri Aisyiyah']
        );
    }

    //Dasboard Donasi sebelum login
    public function dashboard(){
        return view('fitur.donasi.dashboard', 
        ['title'=> 'Donasi Panti Asuhan Putri Aisyiyah']);
    }
    
    //galeri user
    public function galeri(){
        $galeri = Galeri::all();
        return view('fitur.user.galeri', 
        ['data' => $galeri,
        'title'=> 'Galeri Panti Asuhan Putri Aisyiyah']);
    }
    //kegiatan user
    public function kegiatanDetail(){
        $kegiatan = Kegiatan::all();
        return view('fitur.user.kegiatanDetail', 
        ['data' => $kegiatan,
        'title'=> 'Kegiatan Detail Panti Asuhan Putri Aisyiyah']);
    }
}
