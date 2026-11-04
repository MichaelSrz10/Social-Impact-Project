<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DemoDataSeeder extends Seeder
{
    /**
     * Valida la disponibilidad e integridad del dataset simulado de veredas.
     */
    public function run(): void
    {
        $jsonPath = database_path('data/veredas.json');

        if (! File::exists($jsonPath)) {
            $this->command?->error("Archivo {$jsonPath} no encontrado.");
            return;
        }

        $veredas = json_decode(File::get($jsonPath), true);

        if (! is_array($veredas) || count($veredas) !== 12) {
            $this->command?->warn('El archivo JSON no contiene exactamente 12 veredas.');
            return;
        }

        $this->command?->info('Dataset veredas.json validado: 12 veredas simuladas disponibles.');
    }
}
