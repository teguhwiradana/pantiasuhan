<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert(array(
           
         
            [
                'gambar'=>'assets/img/produk/lemper.jpeg',
                'nama'=>'Lemper - Normal',
                'harga'=>3000,
                'tipeproduk_id'=> 1,
                
                
            ],
            [
                'gambar'=>'assets/img/produk/lemper.jpeg',
                'nama'=>'Lemper - Tanggung',  
                'harga'=>2500,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/lemper.jpeg',
                'nama'=>'Lemper - Mini',  
                'harga'=>1850,
                'tipeproduk_id'=> 1,
                
            ],
            [
                'gambar'=>'assets/img/produk/cake-keju.jpeg',
                'nama'=>'Cake Keju - Normal',  
                'harga'=>2900,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/cake-keju.jpeg',
                'nama'=>'Cake Keju - Tanggung', 
                'harga'=>2500, 
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/cake-keju.jpeg',
                'nama'=>'Cake Keju - Mini',  
                'harga'=>1700,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/brownis.jpeg',
                'nama'=>'Brownis - Normal',  
                'harga'=>2850,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/brownis.jpeg',
                'nama'=>'Brownis - Tanggung',  
                'harga'=>2500,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/brownis.jpeg',
                'nama'=>'Brownis - Mini',  
                'harga'=>1700,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/pudding.jpeg',
                'nama'=>'Pudding - Normal',  
                'harga'=>2900,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/pudding.jpeg',
                'nama'=>'Pudding - Tanggung',  
                'harga'=>2500,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/pudding.jpeg',
                'nama'=>'Pudding - Mini',  
                'harga'=>1700,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/kue-mangkok.jpeg',
                'nama'=>'Kue Mangkok - Normal',  
                'harga'=>2900,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/kue-mangkok.jpeg',
                'nama'=>'Kue Mangkok - Tanggung',  
                'harga'=>2500,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/kue-mangkok.jpeg',
                'nama'=>'Kue Mangkok - Mini',  
                'harga'=>1700,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/onde-onde.jpeg',
                'nama'=>'Onde-onde - Normal',  
                'harga'=>3000,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/onde-onde.jpeg',
                'nama'=>'Onde-onde - Tanggung',  
                'harga'=>2500,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/onde-onde.jpeg',
                'nama'=>'Onde-onde - Mini',  
                'harga'=>1950,
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/onggol2.jpeg',
                'nama'=>'Onggol-onggol - Normal', 
                'harga'=>2850, 
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/onggol2.jpeg',
                'nama'=>'Onggol-onggol - Tanggung',
                'harga'=>2500,  
                'tipeproduk_id'=> 1,
            ],
            [
                'gambar'=>'assets/img/produk/onggol2.jpeg',
                'nama'=>'Onggol-onggol - Mini',  
                'harga'=>1700,
                'tipeproduk_id'=> 1,
            ],
           
            [
                'gambar'=>'assets/img/produk/paketAnasiputih.jpeg',
                'nama'=>'Paket Super A Nasi Putih',  
                'harga'=>37000,
                'tipeproduk_id'=> 2,
               
            ],


            ));
            
    }
}
