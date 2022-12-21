<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\PesanDetail;
use App\Models\Riwayat;
use App\Models\Pesan;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class RekapPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Pesan::all();
        $pesan = DB::table('pesans')->get();
        $title = 'Data Pesanan';
        $paginate = Pesan::orderBy('id', 'asc')->paginate(3);
        return view('admin.pesan_kue.rekap.index', compact('data','pesan','title','paginate'));
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
        //menampilkan detail data pesanan berdasarkan Id siswa
        $pesanan = PesanDetail::where('pesan_id',$id)->get();
        $title = 'Data Rekapan Pesanan';
        return view('admin.pesan_kue.rekap.detail', compact('pesanan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesan = Pesan::where('id',$id)->first();
        $title = 'Input Harga Kemasan';
        return view('admin.pesan_kue.rekap.kemasan', compact('pesan', 'title'));
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
        $pesan = Pesan::where('id',$id)->first();
        $pesan->update([
            'kemasan' => $request->kemasan,
            'total_bayar' => $pesan->total_bayar + $request->kemasan,
            'status' => 'process'
        ]);
        Alert::success('Berhasil', 'Berhasil menambahkan harga kemasan');
        return redirect('/pesan');
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
         PesanDetail::where('id',$id)->delete();
         return redirect()->route('pesan.index')
         -> with('success', 'Pesanan Berhasil Dihapus');
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;
        $data = Pesan::where('created_at', 'like', '%' . $keyword . '%')->paginate(3);
        $data->appends(['keyword' => $keyword]);
        $title = 'Pencarian Data Pesanan';
        $paginate = Pesan::orderBy('id', 'asc')->paginate(3);
        return view('admin.pesan_kue.rekap.index', compact('data','paginate','title'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function pendapatan(Request $request)
    {
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        $awal=$request->tanggal_awal;

        $data = array();
        $total_transaksi = 0;
        $total_pendapatan = 0;


        $akhir = date('Y-m-d', strtotime("+1 day", strtotime($tanggalAkhir)));
        $rincian = PesanDetail::whereBetween('created_at',[$tanggalAwal,$akhir])->get();

        while (strtotime($tanggalAwal) <= strtotime($tanggalAkhir)) {
            $tanggal = $tanggalAwal;
            $tanggalAwal = date('Y-m-d', strtotime("+1 day", strtotime($tanggalAwal)));

            $transaksi = Pesan::where('created_at', 'LIKE', "%$tanggal%")->where('status','success')->count();
            $pendapatan = Pesan::where('created_at', 'LIKE', "%$tanggal%")->where('status','success')->sum('total_bayar');

            $total_pendapatan += $pendapatan;
            $total_transaksi += $transaksi;

            $row = array();
            $row['tanggal'] = $tanggal;
            $row['transaksi'] = $total_transaksi;
            $row['pendapatan'] = $total_pendapatan;

            $data[] = $row;

        }



        return view('admin.pesan_kue.rekap.laporan', compact('awal', 'tanggalAkhir', 'total_transaksi', 'total_pendapatan', 'rincian'));
    }



    public function cetak(Request $request){
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        $awal=$request->tanggal_awal;

        $data = array();
        $total_transaksi = 0;
        $total_pendapatan = 0;


        $akhir = date('Y-m-d', strtotime("+1 day", strtotime($tanggalAkhir)));
        $rincian = PesanDetail::whereBetween('created_at',[$tanggalAwal,$akhir])->get();

        while (strtotime($tanggalAwal) <= strtotime($tanggalAkhir)) {
            $tanggal = $tanggalAwal;
            $tanggalAwal = date('Y-m-d', strtotime("+1 day", strtotime($tanggalAwal)));

            $transaksi = Pesan::where('created_at', 'LIKE', "%$tanggal%")->where('status','success')->count();
            $pendapatan = Pesan::where('created_at', 'LIKE', "%$tanggal%")->where('status','success')->sum('total_bayar');

            $total_pendapatan += $pendapatan;
            $total_transaksi += $transaksi;

            $row = array();
            $row['tanggal'] = $tanggal;
            $row['transaksi'] = $total_transaksi;
            $row['pendapatan'] = $total_pendapatan;

            $data[] = $row;

        }

        // return view('admin.pesan_kue.rekap.cetak', compact('tanggalAwal', 'tanggalAkhir', 'transaksi', 'pendapatan', 'rincian'));
        $pdf = PDF::loadview('admin.pesan_kue.rekap.cetak', compact('awal', 'tanggalAkhir', 'total_transaksi', 'total_pendapatan', 'rincian'));
        return $pdf->stream();
    }

}
