<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipeproduk')->insert([ 
            [    'nama' => 'kue',
                
            ],
            [
                'nama' => 'nasi', 
                
            ],
            [
                'nama' => 'tumpeng', 
                
            ],
        ]);
    }
}
