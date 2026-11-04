<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Usuario Administrador (Capitán)
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ucundinamarca.edu.co',
            'password' => Hash::make('Maraton2026*'),
        ]);

        // 2. Usuario Auditor (Para mostrar los logs de seguridad)
        User::factory()->create([
            'name' => 'Auditor Seguridad',
            'email' => 'auditor@ucundinamarca.edu.co',
            'password' => Hash::make('Maraton2026*'),
        ]);

        // 3. Usuario Ciudadano / Estandar
        User::factory()->create([
            'name' => 'Ciudadano Ubaté',
            'email' => 'ciudadano@gmail.com',
            'password' => Hash::make('Maraton2026*'),
        ]);
    }
}