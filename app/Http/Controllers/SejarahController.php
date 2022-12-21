<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function sejarah(){
        return view('fitur.user.profil.sejarah', 
        ['title'=> 'Sejarah Panti Asuhan Izzati Jannah']);
    }
}
