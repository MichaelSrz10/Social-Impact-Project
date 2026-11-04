<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    /**
     * Crea los usuarios de prueba. NUNCA ejecutar con credenciales demo en producción.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            $this->command?->warn('Omitiendo DemoUserSeeder: entorno de producción detectado.');
            return;
        }

        User::updateOrCreate(
            ['email' => 'admin@saludrural.gov.co'],
            [
                'name' => 'Admin Salud Rural',
                'password' => Hash::make('secret123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@ucundinamarca.edu.co'],
            [
                'name' => 'Admin Capitán',
                'password' => Hash::make('Maraton2026*'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'auditor@ucundinamarca.edu.co'],
            [
                'name' => 'Auditor Seguridad',
                'password' => Hash::make('Maraton2026*'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'ciudadano@gmail.com'],
            [
                'name' => 'Ciudadano Ubaté',
                'password' => Hash::make('Maraton2026*'),
            ]
        );
    }
}
