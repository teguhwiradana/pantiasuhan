<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class footerTest extends TestCase
{
    // test instagram
    public function test_instagram()
    {
        $response = $this->get('/https://www.instagram.com/pa_aisyiyah_malang/');

        $response->assertStatus(404);
    }

    // test facebook
    public function test_facebook()
    {
        $response = $this->get('/https://www.facebook.com/profile.php?id=100073960845242');

        $response->assertStatus(404);
    }

    // test youtube
    public function test_youtube()
    {
        $response = $this->get('/https://youtube.com/channel/UCRT5whfV3WW9xPVr92-whCg');

        $response->assertStatus(404);
    }
}
