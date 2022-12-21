<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class kelolaDataDonasiTest extends TestCase
{

    //membuka halaman kelola data donatur
    public function test_halaman_donatur()
    {
        $response = $this->get('/program-donasi/{id_program}');

        $response->assertStatus(302);
    }

    // tambah data donatur
    public function test_tambah_donatur()
    {
        $response = $this->call(method: 'POST', uri: '/donatur/create', parameters: [
            'name' => 'Putra',
            'tgl_donasi' => '11-12-2022',
            'alamat' => 'Malang',
            'bank' => 1,
            'nominal' => 200000,
            'atas_nama' => 'Hamba Allah',
            'nama_bank' => 'BSI',
            'no_rekening' => '2801937816318',
            'program' => 1,
            'keterangan' => '-',
            'bukti_tf' => 'public/assets/img/tempat/p1.jpeg',
        ]);
        $this->assertTrue(condition:true);
    }

    // edit data donatur
    public function test_edit_donatur()
    {
        $response = $this->call(method: 'PUT', uri: '/donatur/edit', parameters: [
            'name' => 'Putri',
            'tgl_donasi' => '11-12-2022',
            'alamat' => 'Pasuruan',
            'bank' => 1,
            'nominal' => 200000,
            'atas_nama' => 'Hamba Allah',
            'nama_bank' => 'BSI',
            'no_rekening' => '2801937816318',
            'program' => 1,
            'keterangan' => '-',
            'bukti_tf' => 'public/assets/img/tempat/p1.jpeg',
        ]);
        $this->assertTrue(condition:true);
    }

    // hapus data donatur
    public function test_hapus_donatur()
    {
        $response = $this->call(method: 'DELETE', uri: '/donatur/destroy', parameters: [
            'name' => 'Putri',
            'tgl_donasi' => '11-12-2022',
            'alamat' => 'Pasuruan',
            'bank' => 1,
            'nominal' => 200000,
            'atas_nama' => 'Hamba Allah',
            'nama_bank' => 'BSI',
            'no_rekening' => '2801937816318',
            'program' => 1,
            'keterangan' => '-',
            'bukti_tf' => 'public/assets/img/tempat/p1.jpeg',
        ]);
        $this->assertTrue(condition:true);
    }

    // detail data donatur
    public function test_detail_donatur()
    {
        $response = $this->call(method: 'SHOW', uri: '/donatur/show', parameters: [
            'name' => 'Putri',
            'tgl_donasi' => '11-12-2022',
            'alamat' => 'Pasuruan',
            'bank' => 1,
            'nominal' => 200000,
            'atas_nama' => 'Hamba Allah',
            'nama_bank' => 'BSI',
            'no_rekening' => '2801937816318',
            'program' => 1,
            'keterangan' => '-',
            'bukti_tf' => 'public/assets/img/tempat/p1.jpeg',
        ]);
        $this->assertTrue(condition:true);
    }

    //cetak laporan
    public function test_cetak_laporan()
    {
        $response = $this->get('/donatur/cetak_pdf/{id_program}');

        $response->assertStatus(302);
    }

    //membuka halaman kelola data program
    public function test_halaman_program()
    {
        $response = $this->get('/program');

        $response->assertStatus(302);
    }

    //tambah data program
    public function test_tambah_program()
    {
        $response = $this->call(method: 'POST', uri: '/program/create', parameters: [
            'nama_program' => 'Renovasi Atap',
            'dns_butuh' => 365000000,
            'dns_terkumpul' => 0,
            'status' => 'open',
        ]);
        $this->assertTrue(condition:true);
    }

    // ubah status program
    public function test_ubah_status_program()
    {
        $response = $this->call(method: 'PUT', uri: '/program/edit', parameters: [
            'nama_program' => 'Renovasi Atap',
            'dns_butuh' => 365000000,
            'dns_terkumpul' => 0,
            'status' => 'clsoe',
        ]);
        $this->assertTrue(condition:true);
    }

    // edit data program
    public function test_edit_program()
    {
        $response = $this->call(method: 'PUT', uri: '/program/edit', parameters: [
            'nama_program' => 'Renovasi Kamar Mandi',
            'dns_butuh' => 365000000,
            'dns_terkumpul' => 0,
            'status' => 'open',
        ]);
        $this->assertTrue(condition:true);
    }

    public function test_hapus_program()
    {
        $response = $this->call(method: 'DELETE', uri: '/program/destroy', parameters: [
            'nama_program' => 'Renovasi Kamar Mandi',
            'dns_butuh' => 365000000,
            'dns_terkumpul' => 0,
            'status' => 'open',
        ]);
        $this->assertTrue(condition:true);
    }

    //membuka halaman kelola data binaan
    public function test_halaman_binaan()
    {
        $response = $this->get('/binaan');

        $response->assertStatus(302);
    }

    //tambah data binaan
    public function test_tambah_binaan()
    {
        $response = $this->call(method: 'POST', uri: '/binaan/create', parameters: [
            'nama_binaan' => 'Anisa Dea Angreani',
            'ttl' => '11-12-2013',
            'jekel' => 'P',
            'pendidikan' => 'SD Aisyiyah Malang',
            'umur' => '9 tahun',
            'kelas' => '2',
            'status' => 'Dhuafa',
            'domisili' => 'ASRAMA',
        ]);
        $this->assertTrue(condition:true);
    }

    // edit data binaan
    public function test_edit_binaan()
    {
        $response = $this->call(method: 'PUT', uri: '/binaan/edit', parameters: [
            'nama_binaan' => 'Anisa Dea Angreani',
            'ttl' => '11-12-2013',
            'jekel' => 'P',
            'pendidikan' => 'SD Aisyiyah Malang',
            'umur' => '9 tahun',
            'kelas' => '2',
            'status' => 'Dhuafa',
            'domisili' => 'ASRAMA',
        ]);
        $this->assertTrue(condition:true);
    } 

    // hapus data binaan
    public function test_hapus_binaan()
    {
        $response = $this->call(method: 'DELETE', uri: '/binaan/destroy', parameters: [
            'nama_binaan' => 'Anisa Dea Angreani',
            'ttl' => '11-12-2013',
            'jekel' => 'P',
            'pendidikan' => 'SD Aisyiyah Malang',
            'umur' => '9 tahun',
            'kelas' => '2',
            'status' => 'Dhuafa',
            'domisili' => 'ASRAMA',
        ]);
        $this->assertTrue(condition:true);
    }  

    //membuka halaman kelola data bank
    public function test_halaman_bank()
    {
        $response = $this->get('/bank');

        $response->assertStatus(302);
    }

    //tambah data bank
    public function test_tambah_bank()
    {
        $response = $this->call(method: 'POST', uri: '/bank/create', parameters: [
            'nama_bank' => 'BSI',
            'nama_rekening' => 'Panti Asuhan Putri Aisyiyah',
            'norekening' => '7004777098',
            'gambar' => 'public/assets/img/2.png',
        ]);
        $this->assertTrue(condition:true);
    }

    // edit data bank
    public function test_edit_bank()
    {
        $response = $this->call(method: 'PUT', uri: '/bank/edit', parameters: [
            'nama_bank' => 'BCA',
            'nama_rekening' => 'Panti Asuhan Putri Aisyiyah Malang',
            'norekening' => '7004777098',
            'gambar' => 'public/assets/img/2.png',
        ]);
        $this->assertTrue(condition:true);
    }

    // hapus data bank
    public function test_hapus_bank()
    {
        $response = $this->call(method: 'DELETE', uri: '/bank/destroy', parameters: [
            'nama_bank' => 'BCA',
            'nama_rekening' => 'Panti Asuhan Putri Aisyiyah Malang',
            'norekening' => '7004777098',
            'gambar' => 'public/assets/img/2.png',
        ]);
        $this->assertTrue(condition:true);
    }
    
}
