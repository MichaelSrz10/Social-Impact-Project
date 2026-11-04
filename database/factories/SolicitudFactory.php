<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Solicitud>
 */
class SolicitudFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'vereda_id' => 1,
            'vereda_nombre' => 'Ojo de Agua',
            'lat' => 5.319,
            'lng' => -73.824,
            'paciente' => fake()->name(),
            'tipo_servicio' => 'Vacunación o control infantil',
            'direccion_referencia' => null,
            'descripcion' => null,
            'urgencia' => 'media',
            'prioridad' => 9,
            'estado' => 'pendiente',
        ];
    }
}

