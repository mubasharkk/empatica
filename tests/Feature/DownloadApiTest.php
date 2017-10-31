<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DownloadApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $requestData = [
            'app_id' => 'IOS_ALERT',
            'latitude' => '52.5200',
            'longitude' => '13.4050',
        ];
        $response = $this->json('POST', '/api/download', $requestData);
        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => true,
                'status' => true,
                'created' => true,
            ]);
    }
}
