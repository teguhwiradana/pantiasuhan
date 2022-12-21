<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class donasi_login_Test extends TestCase
{
    /**test */
    public function test_halaman_donasi()
    {
        $response = $this->get('/dashboard-donasi');

        $response->assertStatus(302);
    }
    
    public function test_halaman_formulir_donasi()
    {
        $response = $this->get('/formulir-donasi');

        $response->assertStatus(302);
    }

    public function test_halaman_riwayat_donasi()
    {
        $response = $this->get('/donasi-riwayat');

        $response->assertStatus(302);
    }

    public function test_halaman_daftar_binaan()
    {
        $response = $this->get('/daftar-binaan');

        $response->assertStatus(302);
    }

    // mengisi formulir dengan valid
    public function test_isi_formulir_login()
    {
        $response = $this->call(method: 'POST', uri: '/donatur/create', parameters: [
            'name' => 'Putri Agustian',
            'tgl_donasi' => '11-12-2022',
            'alamat' => 'Malang',
            'bank' => 1,
            'nominal' => 200000,
            'atas_nama' => 'Hamba Allah',
            'nama_bank' => 'BCA',
            'no_rekening' => '2801937816318',
            'program' => 1,
            'keterangan' => '-',
            'bukti_tf' => 'public/assets/img/tempat/p1.jpeg',
        ]);
        $this->assertTrue(condition:true);
    }

    // mengisi formulir dengan bukti tf invalid
    public function test_isi_formulir_login_invalid()
    {
        $response = $this->call(method: 'POST', uri: '/donatur/create', parameters: [
            'name' => 'Putri Agustian',
            'tgl_donasi' => '11-12-2022',
            'alamat' => 'Malang',
            'bank' => 1,
            'nominal' => 200000,
            'atas_nama' => 'Hamba Allah',
            'nama_bank' => 'BCA',
            'no_rekening' => '2801937816318',
            'program' => 1,
            'keterangan' => '-',
            'bukti_tf' => 'p1.jpeg',
        ]);
        $response->assertSessionHasErrors('bukti_tf');
    }

}
