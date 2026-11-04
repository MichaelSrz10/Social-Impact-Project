<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_any_dashboard_and_is_redirected_to_login(): void
    {
        $this->get('/dashboard')->assertRedirect(route('login'));
        $this->get('/dashboard/promotor')->assertRedirect(route('login'));
        $this->get('/dashboard/user')->assertRedirect(route('login'));
    }

    public function test_promotor_is_redirected_to_promotor_dashboard_from_index(): void
    {
        $promotor = User::factory()->create([
            'role' => 'promotor',
            'name' => 'Dra. Marcela Galeano',
        ]);

        $response = $this->actingAs($promotor)->get('/dashboard');

        $response->assertRedirect(route('dashboard.promotor'));
    }

    public function test_standard_user_is_redirected_to_user_dashboard_from_index(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
            'name' => 'Rosalba Martínez',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect(route('dashboard.user'));
    }

    public function test_promotor_can_access_promotor_dashboard(): void
    {
        $promotor = User::factory()->create([
            'role' => 'promotor',
            'name' => 'Dra. Marcela Galeano',
        ]);

        $response = $this->actingAs($promotor)->get('/dashboard/promotor');

        $response->assertStatus(200);
        $response->assertSee('Dra. Marcela Galeano');
        $response->assertSee('Panel Territorial');
        $response->assertSee(route('logout'));
    }

    public function test_standard_user_is_forbidden_from_promotor_dashboard_by_policy(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
            'name' => 'Rosalba Martínez',
        ]);

        $response = $this->actingAs($user)->get('/dashboard/promotor');

        $response->assertStatus(403);
    }

    public function test_standard_user_can_access_user_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
            'name' => 'Rosalba Martínez',
        ]);

        $response = $this->actingAs($user)->get('/dashboard/user');

        $response->assertStatus(200);
        $response->assertSee('Rosalba Martínez');
        $response->assertSee(route('logout'));
    }
}

