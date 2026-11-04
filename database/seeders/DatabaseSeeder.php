<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Coordina la carga inicial del sistema.
     */
    public function run(): void
    {
        $this->call([
            DemoUserSeeder::class,
            DemoDataSeeder::class,
        ]);
    }
}
