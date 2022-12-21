<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Bank;
use App\Models\Produk;
use App\Models\PesanDetail;
use App\Models\Pesan;
use App\Models\Riwayat;
use RealRashid\SweetAlert\Facades\Alert;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = Harga::all();
        // return view('fitur.pesan_kue.checkout', ['active'=>'active', 'title'=>'CheckOut'], compact('data'));
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
    public function store(Request $request, $id)
    {

        $pesan = Pesan::where('user_id', Auth::user()->id)->orderBy('id','desc')->first();
        $PesanDetail = PesanDetail::where('pesan_id', $pesan->id)->first();


        $pesans = $request->validate([
            'bank_id' => 'required',
            'bukti_pembayaran' => 'image|file'
        ]);

        if ($request->file('bukti_pembayaran')) {
            $pesans['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }
        $pesans['status'] = 'success';

        Pesan::where('id', $pesan->id)->update($pesans);
        Alert::success('Berhasil', 'Pembayaran Berhasil');
        return redirect('/riwayat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function riwayat(){
        $rwt = PesanDetail::all();
        if($rwt){
            return view('fitur.pesan_kue.riwayat', [
                'riwayat'=>$rwt
            ]);
        }

    }

    public function riwayatDetail($id)
    {
        $getID = PesanDetail::where('id', $id)->first();
        $pesan = Pesan::where('id', $getID->id)->first();
        return view('fitur.pesan_kue.riwayat-detail', [
            'title' => 'Riwayat Detail',
            'details' => $getID,
        ]);
    }

}
