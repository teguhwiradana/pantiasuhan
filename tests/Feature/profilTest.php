<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class profilSejarahTest extends TestCase
{
    /**test */
    public function test_sejarah()
    {
        $response = $this->get('/profil/sejarah');

        $response->assertStatus(200);
    }

    public function test_visi()
    {
        $response = $this->get('/profil/visi');

        $response->assertStatus(200);
    }

    public function test_kegiatan()
    {
        $response = $this->get('/profil/kegiatan');

        $response->assertStatus(200);
    }
    
    public function test_struktur()
    {
        $response = $this->get('/profil/struktur-kepengurusan');

        $response->assertStatus(200);
    }
}

