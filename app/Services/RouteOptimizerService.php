<?php

namespace App\Services;

class RouteOptimizerService
{
    /**
     * Calcula la distancia entre dos puntos usando la fórmula de Haversine.
     * Retorna la distancia en kilómetros redondeada a 2 decimales.
     */
    public function haversine(float $lat1, float $lng1, float $lat2, float $lng2): float
    {
        $radioTierraKm = 6371.0;

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) ** 2 +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return round($radioTierraKm * $c, 2);
    }

    /**
     * Selecciona exactamente las 5 veredas más vulnerables.
     * En caso de empate en vulnerabilidad, prioriza la más cercana al punto cero.
     *
     * @param array<int, array{id: int|string, nombre: string, lat: float|numeric, lng: float|numeric, vulnerabilidad: int}> $veredas
     * @param array{lat: float|numeric, lng: float|numeric} $puntoCero
     * @return array<int, array<string, mixed>>
     */
    public function selectTopVulnerable(array $veredas, array $puntoCero): array
    {
        $conDistancia = array_map(function (array $vereda) use ($puntoCero) {
            $vereda['_dist_punto_cero'] = $this->haversine(
                (float) $puntoCero['lat'],
                (float) $puntoCero['lng'],
                (float) $vereda['lat'],
                (float) $vereda['lng']
            );
            return $vereda;
        }, $veredas);

        usort($conDistancia, function (array $a, array $b): int {
            // Mayor vulnerabilidad primero (descendente)
            if ($a['vulnerabilidad'] !== $b['vulnerabilidad']) {
                return $b['vulnerabilidad'] <=> $a['vulnerabilidad'];
            }

            // Desempate: menor distancia al punto cero primero (ascendente)
            return $a['_dist_punto_cero'] <=> $b['_dist_punto_cero'];
        });

        $top5 = array_slice($conDistancia, 0, 5);

        return array_values(array_map(function (array $vereda): array {
            unset($vereda['_dist_punto_cero']);
            return $vereda;
        }, $top5));
    }

    /**
     * Ordena las veredas mediante el algoritmo de Vecino Más Cercano (Nearest Neighbor),
     * partiendo del punto cero.
     *
     * @param array<int, array{id: int|string, nombre: string, lat: float|numeric, lng: float|numeric, vulnerabilidad: int}> $veredas
     * @param array{lat: float|numeric, lng: float|numeric} $puntoCero
     * @return array{punto_cero: array{lat: float, lng: float}, ruta: array<int, array<string, mixed>>, distancia_total_km: float, algoritmo: string}
     */
    public function nearestNeighbor(array $veredas, array $puntoCero): array
    {
        $noVisitadas = array_values($veredas);
        $ruta = [];
        $distanciaTotal = 0.0;
        $orden = 1;

        $actualLat = (float) $puntoCero['lat'];
        $actualLng = (float) $puntoCero['lng'];

        while (! empty($noVisitadas)) {
            $mejorIndice = null;
            $menorDistancia = null;

            foreach ($noVisitadas as $indice => $vereda) {
                $distancia = $this->haversine(
                    $actualLat,
                    $actualLng,
                    (float) $vereda['lat'],
                    (float) $vereda['lng']
                );

                if ($menorDistancia === null || $distancia < $menorDistancia) {
                    $menorDistancia = $distancia;
                    $mejorIndice = $indice;
                }
            }

            $siguiente = $noVisitadas[$mejorIndice];
            unset($noVisitadas[$mejorIndice]);
            $noVisitadas = array_values($noVisitadas);

            $distanciaTotal += $menorDistancia;

            $ruta[] = [
                'orden' => $orden++,
                'id' => $siguiente['id'],
                'nombre' => $siguiente['nombre'],
                'lat' => (float) $siguiente['lat'],
                'lng' => (float) $siguiente['lng'],
                'vulnerabilidad' => (int) $siguiente['vulnerabilidad'],
                'distancia_desde_anterior_km' => $menorDistancia,
            ];

            $actualLat = (float) $siguiente['lat'];
            $actualLng = (float) $siguiente['lng'];
        }

        return [
            'punto_cero' => [
                'lat' => (float) $puntoCero['lat'],
                'lng' => (float) $puntoCero['lng'],
            ],
            'ruta' => $ruta,
            'distancia_total_km' => round($distanciaTotal, 2),
            'algoritmo' => 'nearest_neighbor_haversine',
        ];
    }

    /**
     * Orquestación completa: selecciona top 5 vulnerables y optimiza por vecino más cercano.
     *
     * @param array<int, array{id: int|string, nombre: string, lat: float|numeric, lng: float|numeric, vulnerabilidad: int}> $veredas
     * @param array{lat: float|numeric, lng: float|numeric} $puntoCero
     * @return array{punto_cero: array{lat: float, lng: float}, ruta: array<int, array<string, mixed>>, distancia_total_km: float, algoritmo: string}
     */
    public function optimize(array $veredas, array $puntoCero): array
    {
        $top5 = $this->selectTopVulnerable($veredas, $puntoCero);

        return $this->nearestNeighbor($top5, $puntoCero);
    }
}

