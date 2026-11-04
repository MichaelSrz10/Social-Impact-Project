<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class RutaApiTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'name' => 'Dr. Carlos Mendoza',
            'email' => 'carlos@saludrural.gov.co',
            'password' => bcrypt('password123'),
        ]);
    }

    public function test_optimizar_ruta_returns_401_when_unauthenticated(): void
    {
        $response = $this->postJson('/api/v1/rutas/optimizar', [
            'punto_cero' => ['lat' => 5.31, 'lng' => -73.81],
            'veredas' => [
                ['id' => 1, 'nombre' => 'Vereda 1', 'lat' => 5.30, 'lng' => -73.80, 'vulnerabilidad' => 8],
            ],
        ]);

        $response->assertStatus(401);
    }

    public function test_optimizar_ruta_returns_200_and_exact_contract_with_valid_token(): void
    {
        Passport::actingAs($this->user);

        $payload = [
            'punto_cero' => [
                'lat' => 5.31,
                'lng' => -73.81,
            ],
            'veredas' => [
                ['id' => 1, 'nombre' => 'El Peñón', 'lat' => 5.30, 'lng' => -73.80, 'vulnerabilidad' => 8],
                ['id' => 2, 'nombre' => 'La Esperanza', 'lat' => 5.32, 'lng' => -73.82, 'vulnerabilidad' => 9],
                ['id' => 3, 'nombre' => 'San José', 'lat' => 5.33, 'lng' => -73.83, 'vulnerabilidad' => 10],
                ['id' => 4, 'nombre' => 'El Retiro', 'lat' => 5.29, 'lng' => -73.79, 'vulnerabilidad' => 7],
                ['id' => 5, 'nombre' => 'La Palma', 'lat' => 5.34, 'lng' => -73.84, 'vulnerabilidad' => 8],
                ['id' => 6, 'nombre' => 'Las Mercedes', 'lat' => 5.35, 'lng' => -73.85, 'vulnerabilidad' => 6],
                ['id' => 7, 'nombre' => 'El Carmen', 'lat' => 5.28, 'lng' => -73.78, 'vulnerabilidad' => 5],
            ],
        ];

        $response = $this->postJson('/api/v1/rutas/optimizar', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'punto_cero' => ['lat', 'lng'],
                    'ruta' => [
                        '*' => [
                            'orden',
                            'id',
                            'nombre',
                            'lat',
                            'lng',
                            'vulnerabilidad',
                            'distancia_desde_anterior_km',
                        ],
                    ],
                    'distancia_total_km',
                    'algoritmo',
                ],
                'meta' => [
                    'generado_por',
                    'generado_en',
                    'audit_id',
                ],
            ]);

        $responseData = $response->json();

        // Exactamente 5 veredas seleccionadas
        $this->assertCount(5, $responseData['data']['ruta']);

        // Algoritmo correcto
        $this->assertEquals('nearest_neighbor_haversine', $responseData['data']['algoritmo']);

        // Punto cero preservado
        $this->assertEquals(5.31, $responseData['data']['punto_cero']['lat']);
        $this->assertEquals(-73.81, $responseData['data']['punto_cero']['lng']);

        // Meta datos correctos
        $this->assertEquals('Dr. Carlos Mendoza', $responseData['meta']['generado_por']);
        $this->assertNotEmpty($responseData['meta']['generado_en']);
        $this->assertIsInt($responseData['meta']['audit_id']);
        $this->assertGreaterThan(0, $responseData['meta']['audit_id']);

        // Las veredas seleccionadas deben ser las de mayor vulnerabilidad (ids 3, 2, 1, 5, 4)
        $idsRuta = array_column($responseData['data']['ruta'], 'id');
        $this->assertContains(3, $idsRuta); // vuln 10
        $this->assertContains(2, $idsRuta); // vuln 9
        $this->assertContains(1, $idsRuta); // vuln 8
        $this->assertContains(5, $idsRuta); // vuln 8
        $this->assertContains(4, $idsRuta); // vuln 7
        $this->assertNotContains(6, $idsRuta); // vuln 6
        $this->assertNotContains(7, $idsRuta); // vuln 5

        // Validar orden correlativo 1..5
        foreach ($responseData['data']['ruta'] as $index => $item) {
            $this->assertEquals($index + 1, $item['orden']);
            $this->assertIsFloat($item['distancia_desde_anterior_km']);
        }

        // Distancia total es numérica y positiva
        $this->assertGreaterThan(0, $responseData['data']['distancia_total_km']);
    }

    public function test_optimizar_ruta_con_dataset_real_de_12_veredas_simuladas(): void
    {
        Passport::actingAs($this->user);

        $json = file_get_contents(base_path('database/data/veredas.json'));
        $veredas = json_decode($json, true);

        $payload = [
            'punto_cero' => [
                'lat' => 5.3085,
                'lng' => -73.8145,
            ],
            'veredas' => $veredas,
        ];

        $response = $this->postJson('/api/v1/rutas/optimizar', $payload);

        $response->assertStatus(200);
        $data = $response->json('data');

        // Exactamente 5 veredas seleccionadas
        $this->assertCount(5, $data['ruta']);

        // Algoritmo correcto
        $this->assertEquals('nearest_neighbor_haversine', $data['algoritmo']);

        // El ID de mayor vulnerabilidad (id 5, vuln 10) debe estar en la ruta
        $ids = array_column($data['ruta'], 'id');
        $this->assertContains(5, $ids);

        // Audit ID debe ser entero positivo
        $this->assertIsInt($response->json('meta.audit_id'));
    }

    public function test_optimizar_ruta_returns_422_when_validation_fails(): void
    {
        Passport::actingAs($this->user);

        // Menos de 5 veredas e IDs repetidos
        $payload = [
            'punto_cero' => ['lat' => 120.0, 'lng' => -200.0], // coordenadas inválidas
            'veredas' => [
                ['id' => 1, 'nombre' => 'V1', 'lat' => 5.0, 'lng' => -73.0, 'vulnerabilidad' => 12], // vuln > 10
                ['id' => 1, 'nombre' => 'V2', 'lat' => 5.1, 'lng' => -73.1, 'vulnerabilidad' => 5], // id repetido
            ],
        ];

        $response = $this->postJson('/api/v1/rutas/optimizar', $payload);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'punto_cero.lat',
                    'punto_cero.lng',
                    'veredas',
                    'veredas.0.vulnerabilidad',
                    'veredas.0.id',
                ],
            ]);
    }
}

