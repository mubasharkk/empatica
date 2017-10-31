<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetJsonDownloadApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('GET', '/api/download');
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
                'data' => []
            ]);
    }
}
