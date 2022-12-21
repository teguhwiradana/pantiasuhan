<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 13px;
  border-collapse: collapse;
  width: 100%;
}
#c td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #0D4C7E;
  color: white;
  font-size: 12px;
}
</style>
</head>
<body>
    <center>
        <h3>Laporan Pendapatan</h3>
        <h3>Periode Tanggal {{$awal}} s/d {{$tanggalAkhir}}</h3>
        <p>-----------------------------------------------------------------------------------------------------------------------------------</p>
    </center>
    <h4 class="text-center">Ringkasan Transaksi</h4>
    <p><strong>Total Pendapatan</strong> : Rp. {{$total_pendapatan}}</p>
    <p><strong>Total Transaksi</strong> : {{$total_transaksi}}</p>
    <p>-----------------------------------------------------------------------------------------------------------------------------------</p>
                
    <center>
    <h2>Rincian Transaksi</h2>
    </center>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga/Produk</th>
            <th>Total Bayar</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($rincian as $d)
            @if ($d->pesan->status == "success")
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $d->created_at->format('Y-m-d') }}</td>
                <td align="center">{{ $d->produk->nama }}</td>
                <td align="center">{{ $d->jumlah }} biji</td>
                <td align="center">Rp {{ number_format($d->produk->harga)}}</td>
                <td align="center">Rp. {{ $d->total }}</td>
            </tr>
            @endif
            @endforeach 
        </tbody>
    </table>
</body>
</html>

