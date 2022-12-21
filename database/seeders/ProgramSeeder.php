<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{

    public function run()
    {
        DB::table('programs')->insert([
            [
                'nama_program' => 'Renovasi Atap',
                'dns_butuh' => '365000000',
                
            ],
            [
                'nama_program' => 'Donasi Bebas',
                'dns_butuh' => '0',

            ]
        ]
        );
    }
}
