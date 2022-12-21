<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatans')->insert([
            [
                // 'foto' => 'batik celup.jpeg',
                'judul' => 'Batik Celup',
                'deskripsi' => 'Kegiatan Batik Celup di Panti Asuhan yang dilakukan oleh para santriwati'
            ],
            [
                // 'foto' => 'batik celup1.jpeg',
                'judul' => 'Batik Celup',
                'deskripsi' => 'Kegiatan Batik Celup di Panti Asuhan yang dilakukan oleh para santriwati'
            ],
            [
                // 'foto' => 'batik celup2.jpeg',
                'judul' => 'Batik Celup',
                'deskripsi' => 'Kegiatan Batik Celup di Panti Asuhan yang dilakukan oleh para santriwati'
            ],
            [
                // 'foto' => 'batik celup3.jpeg',
                'judul' => 'Batik Celup',
                'deskripsi' => 'Kegiatan Batik Celup di Panti Asuhan yang dilakukan oleh para santriwati'
            ],
            [
                // 'foto' => 'jalan jalan.jpeg',
                'judul' => 'Jalan - Jalan Ceria',
                'deskripsi' => 'Kegiatan liburan yang dilakukan bersama seluruh keluarga panti'
            ],
            [
                // 'foto' => 'jalan jalan2.jpeg',
                'judul' => 'Jalan Jalan Ceria 2',
                'deskripsi' => 'Kegiatan liburan yang dilakukan bersama seluruh keluarga panti'
            ],
            [
                // 'foto' => 'jalan jalan3.jpeg',
                'judul' => 'Jalan Jalan Ceria 3',
                'deskripsi' => 'Acara bersama seluruh keluarga besar panti asuhan ke tempat liburan'
            ],
            [
                // 'foto' => 'kurban.jpeg',
                'judul' => 'Penyembelihan Hewan Kurban',
                'deskripsi' => 'Kegiatan yang dilakukan dalam rangka memperingati Hari Raya Idul Adha disetiap tahunnya, Panti Asuhan Putri Aisyiyah Malang melaksanakan kegiatan penyembelihan hewan qurban'
            ],
            [
                // 'foto' => 'kurban2.jpeg',
                'judul' => 'Penyembelihan Hewan Kurban 2',
                'deskripsi' => 'Kegiatan yang dilakukan dalam rangka memperingati Hari Raya Idul Adha disetiap tahunnya, Panti Asuhan Putri Aisyiyah Malang melaksanakan kegiatan penyembelihan hewan qurban'
            ],
            [
                // 'foto' => 'parenting.jpeg',
                'judul' => 'Parenting',
                'deskripsi' => 'Merupakan kegiatan atau pekerjaan orangtua dalam mengasuh anak melalui kegiatan parenting juga orangtua dapat mengetahui capaian perkembangan anak dan memberikan pengetahuan kepada orangtua'
            ],
            [
                // 'foto' => 'parenting2.jpeg',
                'judul' => 'Parenting',
                'deskripsi' => 'Merupakan kegiatan atau pekerjaan orangtua dalam mengasuh anak melalui kegiatan parenting juga orangtua dapat mengetahui capaian perkembangan anak dan memberikan pengetahuan kepada orangtua'
            ],
            [
                // 'foto' => 'riilah2.jpeg',
                'judul' => 'Rihlah dan Pelepasan Santri',
                'deskripsi' => 'Rihlah dilakukan dalam rangka pelepasan santriwati dari panti asuhan, acara ini dilaksanakan dengan ceria di pantai'
            ] 
        ]
        );
    }
}
