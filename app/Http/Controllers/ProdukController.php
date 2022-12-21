<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    // protected function redirectTo(){
    //     if (Auth::user()->level == 'pemesan'){
    //         return 'produk';
    //     }else {
    //         return '/beranda';
    //     }
    // }
     public function index()
    {
         
         $data = Produk::all();
         return view('fitur.pesan_kue.produk', ['active'=>'active', 'title'=>'produk'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //menampilkan detail data siswa berdasarkan Id siswa
         $produk = Produk::where('id',$id)->first();
         $title = 'Detail Produk';
         return view('fitur.pesan_kue.detail', compact('produk', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $data = Produk::where('nama', 'like', '%' . $keyword . '%')->get();
        $title = 'Pencarian Data Kue';
        return view('fitur.pesan_kue.produk', compact('data','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
