<?php

namespace App\Http\Controllers;

use App\Models\donatur;
use App\Models\program;
use Illuminate\Http\Request;

class AdminDonaturController extends Controller
{
    //PROGRAM ADMIN
    public function program(program $program)
    {
        $donatur = donatur::where('id_program', $program->id_program)->paginate(10);
        $title = 'Data Donatur';
        return view('admin.donasi.donatur.indexDonatur', [
            'title' => $title, 'program' => $program ?? null, 'donatur' => $donatur ?? null,
        ]);
    }
    
    public function show($id)
    {
        $donatur = donatur::where('id_donatur', $id) -> first();
        $title ="Detail Data Donatur";
        return view('admin.donasi.donatur.detail', compact('title', 'donatur'));
        
    }
}
