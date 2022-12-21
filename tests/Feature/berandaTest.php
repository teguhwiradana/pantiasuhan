<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ConditionalRules;
use Tests\TestCase;

class berandaTest extends TestCase
{
    /**test */
    public function test_example()
    {
        $response = $this->get('/beranda');

        $response->assertStatus(200);
    }
}
