<?php

namespace App\Services;

class VeredaCatalogService
{
    /**
     * @return array<int, array{id: int, nombre: string, lat: float, lng: float, vulnerabilidad: int}>
     */
    public function all(): array
    {
        $path = database_path('data/veredas.json');

        if (! is_file($path)) {
            return [];
        }

        return json_decode((string) file_get_contents($path), true) ?: [];
    }

    /**
     * @return array{id: int, nombre: string, lat: float, lng: float, vulnerabilidad: int}|null
     */
    public function find(int $id): ?array
    {
        foreach ($this->all() as $vereda) {
            if ((int) $vereda['id'] === $id) {
                return $vereda;
            }
        }

        return null;
    }
}

