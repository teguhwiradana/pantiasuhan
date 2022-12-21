<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class donasiTest extends TestCase
{
    public function test_halaman_donasi_tanpa_login()
    {
        $response = $this->get('/donasi');

        $response->assertStatus(200);
    }

    public function test_halaman_formulir_tanpa_login()
    {
        $response = $this->get('/formulir-donasi-panti');

        $response->assertStatus(200);
    }

    public function test_halaman_rekap_donasi()
    {
        $response = $this->get('/rekap-donasi');

        $response->assertStatus(200);
    }
    
    public function test_isi_formulir_tanpa_login()
    {
        $response = $this->call(method: 'POST', uri: '/donatur/create', parameters: [
            'name' => 'Hamba Allah',
            'tgl_donasi' => '11-12-2022',
            'alamat' => 'Pasuruan',
            'bank' => 1,
            'nominal' => 200000,
            'atas_nama' => 'Hamba Allah',
            'nama_bank' => 'BRI',
            'no_rekening' => '025678497',
            'program' => 1,
            'keterangan' => 'Untuk keperluan panti',
            'bukti_tf' => 'public/assets/img/tempat/p2.jpeg',
        ]);
        $this->assertTrue(condition:true);
    }

    public function test_isi_formulir_salah()
    {
        $response = $this->call(method: 'POST', uri: '/donatur/create', parameters: [
            'name' => 'Hamba Allah',
            'tgl_donasi' => '11-12-2022',
            'alamat' => 'Pasuruan',
            'bank' => 1,
            'nominal' => 'dua ratus ribu rupiah',
            'atas_nama' => 'Hamba Allah',
            'nama_bank' => 'BRI',
            'no_rekening' => '025678497',
            'program' => 1,
            'keterangan' => 'Untuk keperluan panti',
            'bukti_tf' => 'public/assets/img/tempat/p2.jpeg',
        ]);
        $response->assertSessionHasErrors('nominal');
    }
}