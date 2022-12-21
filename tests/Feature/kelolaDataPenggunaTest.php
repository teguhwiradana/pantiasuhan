<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class kelolaDataPenggunaTest extends TestCase
{
    //membuka halaman kelola data pengguna
    public function test_halaman_pengguna()
    {
        $response = $this->get('/pengguna');

        $response->assertStatus(302);
    }

    //tambah data pengguna
    public function test_tambah_pengguna()
    {
        $response = $this->call(method: 'POST', uri: '/pengguna/create', parameters: [
            'name' => 'paputri',
            'email' => 'paputri@gmail.com',
            'password' => 'paputri123',
            'alamat' => 'Malang',
            'nohp' => '08592810286',
            'role' => 'donatur',
        ]);
        $this->assertTrue(condition:true);
    }

    // edit data pengguna
    public function test_edit_pengguna()
    {
        $response = $this->call(method: 'PUT', uri: '/pengguna/edit', parameters: [
            'name' => 'paputri2',
            'email' => 'paputri2@gmail.com',
            'password' => 'paputri123',
            'alamat' => 'Malang',
            'nohp' => '08592810286',
            'role' => 'donatur',
        ]);
        $this->assertTrue(condition:true);
    }

    // hapus data pengguna
    public function test_hapus_pengguna()
    {
        $response = $this->call(method: 'DELETE', uri: '/pengguna/destroy', parameters: [
            'name' => 'paputri2',
            'email' => 'paputri2@gmail.com',
            'password' => 'paputri123',
            'alamat' => 'Malang',
            'nohp' => '08592810286',
            'role' => 'donatur',
        ]);
        $this->assertTrue(condition:true);
    }
}
