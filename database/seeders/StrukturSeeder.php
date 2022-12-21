<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('strukturs')->insert([
            [
            'name' => 'Aning Rochani',
            'jabatan' => 'Kepala Panti',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Zulfadina, SP',
            'jabatan' => 'Sekretaris',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Siti Nurfatimah',
            'jabatan' => 'Administrasi',
            'keterangan' => 'Pengurus Harian'
        ], 
        [
            'name' => 'Hj. Kartini Djamal',
            'jabatan' => 'Bendahara',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Dra. Baroya Mila Shanty',
            'jabatan' => 'Pembina Pendidikan',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Dra. Nurliani',
            'jabatan' => 'Pembina Pendidikan Agama',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Eni Haryati',
            'jabatan' => 'Pembina Ketrampilan',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Hj. Kusmiatiningsih',
            'jabatan' => 'Tata Boga',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'H. Chabul',
            'jabatan' => 'Pengasuh',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Hj. Sumarti',
            'jabatan' => 'Pengasuh',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Vera Tanjung Kirana S.Sos',
            'jabatan' => 'Tata Usaha - Peksos',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Suharti',
            'jabatan' => 'Pengelola Katering',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Hj. Aminah Ridwan',
            'jabatan' => 'Kesehatan',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Hj. Hanifah Choiri',
            'jabatan' => 'Rumah Tangga',
            'keterangan' => 'Pengurus Harian'
        ],
        [
            'name' => 'Sholichah',
            'jabatan' => 'Juru Masak',
            'keterangan' => 'Fungsional'
        ],
        [
            'name' => 'Nisful Laili',
            'jabatan' => 'Juru Masak',
            'keterangan' => 'Fungsional'
        ],
        [
            'name' => 'Supriyanto',
            'jabatan' => 'Keamanan',
            'keterangan' => 'Fungsional'
        ]
        ]);
    }
}
