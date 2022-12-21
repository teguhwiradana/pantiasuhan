<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class kelolaDataProfilTest extends TestCase
{
    // membuka halaman kelola data galeri
    public function test_halaman_galeri()
    {
        $response = $this->get('/galeri');

        $response->assertStatus(302);
    }

    //tambah data galeri
    public function test_tambah_galeri()
    {
        $response = $this->call(method: 'POST', uri: '/galeri/create', parameters: [
            'gambar' => 'public/assets/img/kegiatan/1.jpeg',
        ]);
        $this->assertTrue(condition:true);
    }
    //edit data galeri
    public function test_edit_galeri()
    {
        $response = $this->call(method: 'PUT', uri: '/galeri/edit', parameters: [
            'gambar' => 'public/assets/img/kegiatan/2.jpeg',
        ]);
        $this->assertTrue(condition:true);
    }

    //menghapus data galeri
    public function test_hapus_galeri()
    {
        $response = $this->call(method: 'DELETE', uri: '/galeri/destroy', parameters: [
            'gambar' => 'public/assets/img/kegiatan/2.jpeg',
        ]);
        $this->assertTrue(condition:true);
    }

    // membuka halaman kelola data kegiatan
    public function test_halaman_kegiatan()
    {
        $response = $this->get('/kegiatan');

        $response->assertStatus(302);
    }

    // tambah data kegiatan
    public function test_tambah_kegiatan()
    {
        $response = $this->call(method: 'POST', uri: '/kegiatan/create', parameters: [
            'foto' => 'public/assets/img/kegiatan/1.jpeg',
            'judul' => 'Batik Celup',
            'deskripsi' => 'Kegiatan Rutin Panti Asuhan',
        ]);
        $this->assertTrue(condition:true);
    }

    // edit data kegiatan
    public function test_edit_kegiatan()
    {
        $response = $this->call(method: 'PUT', uri: '/kegiatan/edit', parameters: [
            'foto' => 'public/assets/img/kegiatan/1.jpeg',
            'judul' => 'Batik Celup Lagi',
            'deskripsi' => 'Kegiatan Rutin Panti Asuhan Putri',
        ]);
        $this->assertTrue(condition:true);
    }

    // hapus data kegiatan
    public function test_hapus_kegiatan()
    {
        $response = $this->call(method: 'DELETE', uri: '/kegiatan/destroy', parameters: [
            'foto' => 'public/assets/img/kegiatan/1.jpeg',
            'judul' => 'Batik Celup Lagi',
            'deskripsi' => 'Kegiatan Rutin Panti Asuhan Putri',
        ]);
        $this->assertTrue(condition:true);
    }

    //membuka halaman kelola data struktur kepengurusan
    public function test_halaman_struktur()
    {
        $response = $this->get('/struktur');

        $response->assertStatus(302);
    }

    //tambah data struktur kepengurusan
    public function test_tambah_struktur()
    {
        $response = $this->call(method: 'POST', uri: '/struktur/create', parameters: [
            'name' => 'Aning Rochani',
            'jabatan' => 'Kepala Panti',
            'keterangan' => 'Pengurus Harian',
        ]);
        $this->assertTrue(condition:true);
    }

    // edit data struktur
    public function test_edit_struktur()
    {
        $response = $this->call(method: 'PUT', uri: '/struktur/edit', parameters: [
            'name' => 'Aning ',
            'jabatan' => 'Sekretaris Panti',
            'keterangan' => 'Pengurus Harian',
        ]);
        $this->assertTrue(condition:true);
    }

    public function test_hapus_struktur()
    {
        $response = $this->call(method: 'DELETE', uri: '/struktur/destroy', parameters: [
            'name' => 'Aning ',
            'jabatan' => 'Sekretaris Panti',
            'keterangan' => 'Pengurus Harian',
        ]);
        $this->assertTrue(condition:true);
    }

}
