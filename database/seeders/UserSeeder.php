<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(array(
            
            [   
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password' => Hash::make('admin'),
                'alamat'=>'malang',
                'nohp'=>'081233967234',
                'role'=>'admin'    
            ]
            

            
            ));
    }
}
