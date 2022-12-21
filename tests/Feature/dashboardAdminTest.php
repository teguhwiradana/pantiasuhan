<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class dashboardAdminTest extends TestCase
{
    public function test_halaman_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
    }
}
