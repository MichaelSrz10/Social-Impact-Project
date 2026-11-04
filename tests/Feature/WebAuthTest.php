<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class WebAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_can_be_rendered_with_correct_links(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('RutaSalud Rural');
        $response->assertSee(route('login'));
        $response->assertSee(route('register'));
    }

    public function test_home_page_displays_authenticated_navigation_when_user_is_logged_in(): void
    {
        $user = User::factory()->create([
            'name' => 'Dra. Camila Morales',
            'email' => 'camila@saludrural.gov.co',
        ]);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertSee('Dra. Camila Morales');
        $response->assertSee(route('dashboard'));
        $response->assertSee(route('logout'));
    }

    public function test_login_screen_can_be_rendered_for_guests(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Iniciar Sesión');
        $response->assertSee(route('login'));
        $response->assertSee(route('register'));
        $response->assertSee(route('home'));
        $response->assertSee('name="_token"', false);
    }

    public function test_register_screen_can_be_rendered_for_guests(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Crear cuenta');
        $response->assertSee(route('register'));
        $response->assertSee(route('login'));
        $response->assertSee(route('home'));
        $response->assertSee('name="_token"', false);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'email' => 'operativo@saludrural.gov.co',
            'password' => Hash::make('PasswordSeguro123!'),
        ]);

        $response = $this->post('/login', [
            'email' => 'operativo@saludrural.gov.co',
            'password' => 'PasswordSeguro123!',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'email' => 'operativo@saludrural.gov.co',
            'password' => Hash::make('PasswordSeguro123!'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => 'operativo@saludrural.gov.co',
            'password' => 'clave-equivocada',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
    }

    public function test_users_can_logout_and_session_is_invalidated(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }

    public function test_users_can_register_through_the_web_form(): void
    {
        $response = $this->post('/register', [
            'name' => 'Rosalba Martínez',
            'email' => 'rosalba.comunal@saludrural.gov.co',
            'password' => 'ClaveRobusta123*',
            'password_confirmation' => 'ClaveRobusta123*',
            'tipo_documento' => 'CC',
            'numero_documento' => '1029384756',
            'telefono' => '3119876543',
            'municipio' => 'Ubaté',
            'vereda' => 'El Volcán',
            'terms' => '1',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));

        $this->assertDatabaseHas('users', [
            'email' => 'rosalba.comunal@saludrural.gov.co',
            'name' => 'Rosalba Martínez',
        ]);
    }

    public function test_registration_fails_with_duplicate_email(): void
    {
        User::factory()->create([
            'email' => 'existente@saludrural.gov.co',
        ]);

        $response = $this->from('/register')->post('/register', [
            'name' => 'Otro Usuario',
            'email' => 'existente@saludrural.gov.co',
            'password' => 'ClaveRobusta123*',
            'password_confirmation' => 'ClaveRobusta123*',
            'terms' => '1',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('email');
    }

    public function test_registration_fails_when_terms_are_not_accepted(): void
    {
        $response = $this->from('/register')->post('/register', [
            'name' => 'Usuario Sin Terminos',
            'email' => 'sin.terminos@saludrural.gov.co',
            'password' => 'ClaveRobusta123*',
            'password_confirmation' => 'ClaveRobusta123*',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('terms');
    }

    public function test_authenticated_users_are_redirected_from_login_and_register(): void
    {
        $user = User::factory()->create();

        $responseLogin = $this->actingAs($user)->get('/login');
        $responseLogin->assertRedirect(route('dashboard', absolute: false));

        $responseRegister = $this->actingAs($user)->get('/register');
        $responseRegister->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_guests_cannot_access_dashboard_and_are_redirected_to_login(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_access_dashboard(): void
    {
        $user = User::factory()->create([
            'name' => 'Dr. Fernando Ruiz',
            'role' => 'user',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect(route('dashboard.user'));
    }
}
