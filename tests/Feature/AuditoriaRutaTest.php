<?php

namespace Tests\Feature;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AuditoriaRutaTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'name' => 'Dra. Valentina Gomez',
            'email' => 'valentina@saludrural.gov.co',
        ]);
    }

    public function test_optimizacion_exitosa_genera_registro_con_usuario_parametros_y_resultado(): void
    {
        Passport::actingAs($this->user);

        $payload = [
            'punto_cero' => ['lat' => 5.31, 'lng' => -73.81],
            'veredas' => [
                ['id' => 1, 'nombre' => 'V1', 'lat' => 5.30, 'lng' => -73.80, 'vulnerabilidad' => 8],
                ['id' => 2, 'nombre' => 'V2', 'lat' => 5.32, 'lng' => -73.82, 'vulnerabilidad' => 9],
                ['id' => 3, 'nombre' => 'V3', 'lat' => 5.33, 'lng' => -73.83, 'vulnerabilidad' => 10],
                ['id' => 4, 'nombre' => 'V4', 'lat' => 5.29, 'lng' => -73.79, 'vulnerabilidad' => 7],
                ['id' => 5, 'nombre' => 'V5', 'lat' => 5.34, 'lng' => -73.84, 'vulnerabilidad' => 8],
            ],
        ];

        $response = $this->postJson('/api/v1/rutas/optimizar', $payload);

        $response->assertStatus(200);

        // 1. Una optimización exitosa genera un registro
        $this->assertDatabaseCount('audit_logs', 1);

        /** @var \App\Models\AuditLog $log */
        $log = AuditLog::first();

        // 2. El registro contiene el usuario autenticado
        $this->assertEquals($this->user->id, $log->user_id);
        $this->assertEquals('api/v1/rutas/optimizar', $log->endpoint);
        $this->assertEquals(200, $log->status_code);

        // 3. Guarda parámetros y resultado
        $this->assertIsArray($log->parametros);
        $this->assertEquals(5.31, $log->parametros['punto_cero']['lat']);
        $this->assertCount(5, $log->parametros['veredas']);

        $this->assertIsArray($log->resultado);
        $this->assertArrayHasKey('data', $log->resultado);
        $this->assertArrayHasKey('meta', $log->resultado);

        // 4. El audit_id de la respuesta coincide con el ID de la base de datos
        $auditIdRespuesta = $response->json('meta.audit_id');
        $this->assertNotNull($auditIdRespuesta);
        $this->assertEquals($log->id, $auditIdRespuesta);
        $this->assertEquals($log->id, $log->resultado['meta']['audit_id']);
    }

    public function test_no_almacena_tokens_ni_contrasenas_en_parametros(): void
    {
        Passport::actingAs($this->user);

        $payload = [
            'punto_cero' => ['lat' => 5.31, 'lng' => -73.81],
            'password' => 'supersecret123',
            'token' => 'bearer-token-inseguro',
            'access_token' => 'xyz-token',
            'veredas' => [
                ['id' => 1, 'nombre' => 'V1', 'lat' => 5.30, 'lng' => -73.80, 'vulnerabilidad' => 8],
                ['id' => 2, 'nombre' => 'V2', 'lat' => 5.32, 'lng' => -73.82, 'vulnerabilidad' => 9],
                ['id' => 3, 'nombre' => 'V3', 'lat' => 5.33, 'lng' => -73.83, 'vulnerabilidad' => 10],
                ['id' => 4, 'nombre' => 'V4', 'lat' => 5.29, 'lng' => -73.79, 'vulnerabilidad' => 7],
                ['id' => 5, 'nombre' => 'V5', 'lat' => 5.34, 'lng' => -73.84, 'vulnerabilidad' => 8],
            ],
        ];

        $response = $this->postJson('/api/v1/rutas/optimizar', $payload);

        $response->assertStatus(200);

        /** @var \App\Models\AuditLog $log */
        $log = AuditLog::first();

        // 5. No almacena tokens ni contraseñas
        $this->assertArrayNotHasKey('password', $log->parametros);
        $this->assertArrayNotHasKey('token', $log->parametros);
        $this->assertArrayNotHasKey('access_token', $log->parametros);
    }

    public function test_solicitud_invalida_registra_codigo_422_en_auditoria(): void
    {
        Passport::actingAs($this->user);

        // Payload inválido: solo 2 veredas (mínimo son 5)
        $payload = [
            'punto_cero' => ['lat' => 5.31, 'lng' => -73.81],
            'veredas' => [
                ['id' => 1, 'nombre' => 'V1', 'lat' => 5.30, 'lng' => -73.80, 'vulnerabilidad' => 8],
                ['id' => 2, 'nombre' => 'V2', 'lat' => 5.32, 'lng' => -73.82, 'vulnerabilidad' => 9],
            ],
        ];

        $response = $this->postJson('/api/v1/rutas/optimizar', $payload);

        $response->assertStatus(422);

        // 6. Registra correctamente el código 422
        $this->assertDatabaseCount('audit_logs', 1);

        /** @var \App\Models\AuditLog $log */
        $log = AuditLog::first();
        $this->assertEquals(422, $log->status_code);
        $this->assertEquals($this->user->id, $log->user_id);
        $this->assertArrayHasKey('errors', $log->resultado);
        $this->assertArrayHasKey('veredas', $log->resultado['errors']);
    }

    public function test_solicitud_no_autenticada_no_genera_registro_de_auditoria(): void
    {
        // Sin token de autenticación
        $response = $this->postJson('/api/v1/rutas/optimizar', [
            'punto_cero' => ['lat' => 5.31, 'lng' => -73.81],
            'veredas' => [
                ['id' => 1, 'nombre' => 'V1', 'lat' => 5.30, 'lng' => -73.80, 'vulnerabilidad' => 8],
                ['id' => 2, 'nombre' => 'V2', 'lat' => 5.32, 'lng' => -73.82, 'vulnerabilidad' => 9],
                ['id' => 3, 'nombre' => 'V3', 'lat' => 5.33, 'lng' => -73.83, 'vulnerabilidad' => 10],
                ['id' => 4, 'nombre' => 'V4', 'lat' => 5.29, 'lng' => -73.79, 'vulnerabilidad' => 7],
                ['id' => 5, 'nombre' => 'V5', 'lat' => 5.34, 'lng' => -73.84, 'vulnerabilidad' => 8],
            ],
        ]);

        $response->assertStatus(401);

        // 7. No debe generar registros de optimización en audit_logs
        $this->assertDatabaseCount('audit_logs', 0);
    }
}

