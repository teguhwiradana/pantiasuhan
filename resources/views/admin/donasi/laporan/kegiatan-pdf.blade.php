<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,td,th{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 8px;
            margin:auto;
        }
    </style>
</head>
<body>
    <h3 align="center">PANTI ASUHAN IZZATI JANNAH</h3>
    <h2 align="center">LAPORAN KEGIATAN</h2>
    <h4 align="center">Danau Sipin Jl. Masjid Nurul Jannah, Selamat, Kota Jambi</h4>
    <hr>
    <table>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
        </tr>
        @foreach($data as $data)
        <tr>
            <td>
                {{$data->judul}}
            </td>
            <td>
                {{$data->deskripsi}}
            </td>
        </tr>
        @endforeach
    </table>



    <!-- tanggal indo -->

    <?php
        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
        
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
    ?>

    <p align="right" style="margin-top:200px">Jambi,{{tgl_indo(date('Y-m-d'))}}</p>
</body>
</html>