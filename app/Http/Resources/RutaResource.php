<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RutaResource extends JsonResource
{
    /**
     * Transforma el recurso en un arreglo compatible con el contrato de la API.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'punto_cero' => [
                'lat' => (float) $this->resource['punto_cero']['lat'],
                'lng' => (float) $this->resource['punto_cero']['lng'],
            ],
            'ruta' => array_map(function (array $item): array {
                return [
                    'orden' => (int) $item['orden'],
                    'id' => $item['id'],
                    'nombre' => (string) $item['nombre'],
                    'lat' => (float) $item['lat'],
                    'lng' => (float) $item['lng'],
                    'vulnerabilidad' => (int) $item['vulnerabilidad'],
                    'distancia_desde_anterior_km' => (float) $item['distancia_desde_anterior_km'],
                ];
            }, $this->resource['ruta']),
            'distancia_total_km' => (float) $this->resource['distancia_total_km'],
            'algoritmo' => (string) $this->resource['algoritmo'],
        ];
    }

    /**
     * Metadatos adicionales para la respuesta.
     *
     * @return array<string, mixed>
     */
    public function with(Request $request): array
    {
        return [
            'meta' => [
                'generado_por' => $request->user()?->name ?? 'Sistema',
                'generado_en' => now()->toIso8601String(),
                'audit_id' => $request->attributes->get('audit_id'),
            ],
        ];
    }
}

