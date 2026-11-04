<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    public function test_api_health_endpoint_returns_200_without_sensitive_data(): void
    {
        $response = $this->getJson('/api/health');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'service',
                'timestamp',
            ])
            ->assertJson([
                'status' => 'ok',
                'service' => 'salud-rural-api',
            ]);

        // Asegurar que no expone datos sensibles ni configuración interna
        $json = $response->json();
        $this->assertArrayNotHasKey('database', $json);
        $this->assertArrayNotHasKey('env', $json);
        $this->assertArrayNotHasKey('config', $json);
    }

    public function test_api_v1_health_endpoint_returns_200(): void
    {
        $response = $this->getJson('/api/v1/health');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'service' => 'salud-rural-api',
            ]);
    }

    public function test_laravel_native_up_endpoint_returns_200(): void
    {
        $response = $this->get('/up');
        $response->assertStatus(200);
    }
}

