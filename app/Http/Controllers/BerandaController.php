<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda(){
        return view('fitur.user.beranda', 
        ['title'=> 'Beranda Panti Asuhan Izzati Jannah']);
    }
}
