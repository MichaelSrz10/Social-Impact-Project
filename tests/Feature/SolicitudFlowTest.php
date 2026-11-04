<?php

namespace Tests\Feature;

use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SolicitudFlowTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $override = []): array
    {
        return array_merge([
            'vereda_id' => 5, // Ramal, vulnerabilidad 10
            'paciente' => 'Don Pedro',
            'tipo_servicio' => 'Control de tensión / medicina habitual',
            'urgencia' => 'alta',
            'direccion_referencia' => 'Frente a la escuela',
            'descripcion' => 'Mareos frecuentes',
        ], $override);
    }

    public function test_ciudadano_radica_solicitud_y_la_ve_en_su_panel(): void
    {
        $user = User::factory()->create(['role' => 'user', 'name' => 'Rosalba Martínez']);

        $this->actingAs($user)->post('/solicitudes', $this->payload())
            ->assertRedirect(route('dashboard.user'));

        $this->assertDatabaseHas('solicitudes', [
            'user_id' => $user->id,
            'vereda_nombre' => 'Ramal',
            'prioridad' => 12, // 10 + urgencia alta (2)
            'estado' => 'pendiente',
        ]);

        $this->actingAs($user)->get('/dashboard/user')
            ->assertOk()
            ->assertSee('Don Pedro')
            ->assertSee('Control de tensión / medicina habitual')
            ->assertSee('En espera de programación');
    }

    public function test_promotor_ve_quien_pidio_el_servicio_y_la_ruta(): void
    {
        $ciudadano = User::factory()->create(['role' => 'user', 'name' => 'Rosalba Martínez', 'email' => 'rosalba@example.com']);
        $promotor = User::factory()->create(['role' => 'promotor']);

        $this->actingAs($ciudadano)->post('/solicitudes', $this->payload());
        $this->actingAs($ciudadano)->post('/solicitudes', $this->payload(['vereda_id' => 3, 'urgencia' => 'baja']));

        $this->actingAs($promotor)->get('/dashboard/promotor')
            ->assertOk()
            ->assertSee('Rosalba Martínez')
            ->assertSee('rosalba@example.com')
            ->assertSee('Vereda Ramal')
            ->assertSee('Vereda Palogordo')
            ->assertSee('Ruta sugerida de hoy');
    }

    public function test_promotor_programa_y_ciudadano_ve_la_fecha(): void
    {
        $ciudadano = User::factory()->create(['role' => 'user']);
        $promotor = User::factory()->create(['role' => 'promotor']);
        $solicitud = Solicitud::factory()->create(['user_id' => $ciudadano->id]);
        $fecha = now()->addDays(2)->toDateString();

        $this->actingAs($promotor)->patch("/solicitudes/{$solicitud->id}/estado", [
            'estado' => 'programada',
            'fecha_programada' => $fecha,
        ])->assertRedirect(route('dashboard.promotor'));

        $this->assertDatabaseHas('solicitudes', ['id' => $solicitud->id, 'estado' => 'programada', 'promotor_id' => $promotor->id]);

        $this->actingAs($ciudadano)->get('/dashboard/user')
            ->assertOk()
            ->assertSee('Visita programada');
    }

    public function test_ciudadano_no_puede_gestionar_estado_ni_ver_panel_promotor(): void
    {
        $ciudadano = User::factory()->create(['role' => 'user']);
        $solicitud = Solicitud::factory()->create(['user_id' => $ciudadano->id]);

        $this->actingAs($ciudadano)->patch("/solicitudes/{$solicitud->id}/estado", ['estado' => 'atendida'])->assertForbidden();
        $this->actingAs($ciudadano)->get('/dashboard/promotor')->assertForbidden();
    }

    public function test_promotor_no_puede_radicar_solicitudes(): void
    {
        $promotor = User::factory()->create(['role' => 'promotor']);

        $this->actingAs($promotor)->post('/solicitudes', $this->payload())->assertForbidden();
    }

    public function test_solo_el_dueno_cancela_su_solicitud_pendiente(): void
    {
        $dueno = User::factory()->create(['role' => 'user']);
        $otro = User::factory()->create(['role' => 'user']);
        $solicitud = Solicitud::factory()->create(['user_id' => $dueno->id]);

        $this->actingAs($otro)->patch("/solicitudes/{$solicitud->id}/cancelar")->assertForbidden();
        $this->actingAs($dueno)->patch("/solicitudes/{$solicitud->id}/cancelar")->assertRedirect(route('dashboard.user'));

        $this->assertDatabaseHas('solicitudes', ['id' => $solicitud->id, 'estado' => 'cancelada']);
    }

    public function test_registro_de_promotor_requiere_codigo_institucional(): void
    {
        $datos = [
            'name' => 'Dr. Nuevo Promotor',
            'email' => 'nuevo.promotor@saludrural.gov.co',
            'password' => 'ClaveRobusta123*',
            'password_confirmation' => 'ClaveRobusta123*',
            'terms' => '1',
            'user-type' => 'medico',
        ];

        $this->from('/register')->post('/register', $datos + ['codigo_promotor' => 'incorrecto'])
            ->assertSessionHasErrors('codigo_promotor');
        $this->assertGuest();

        $this->post('/register', $datos + ['codigo_promotor' => config('rutasalud.promotor_code')])
            ->assertRedirect(route('dashboard', absolute: false));

        $this->assertDatabaseHas('users', ['email' => 'nuevo.promotor@saludrural.gov.co', 'role' => 'promotor']);
    }

    public function test_registro_ciudadano_sigue_siendo_rol_user(): void
    {
        $this->post('/register', [
            'name' => 'Ciudadana Nueva',
            'email' => 'ciudadana@example.com',
            'password' => 'ClaveRobusta123*',
            'password_confirmation' => 'ClaveRobusta123*',
            'terms' => '1',
            'user-type' => 'ciudadano',
        ])->assertRedirect(route('dashboard', absolute: false));

        $this->assertDatabaseHas('users', ['email' => 'ciudadana@example.com', 'role' => 'user']);
    }
}

