<?php

namespace Tests\Unit;

use App\Services\RouteOptimizerService;
use PHPUnit\Framework\TestCase;

class RouteOptimizerServiceTest extends TestCase
{
    protected RouteOptimizerService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new RouteOptimizerService();
    }

    public function test_haversine_calculates_known_distance_correctly(): void
    {
        // 1 grado de longitud en el ecuador con R=6371 km es exactamente ~111.19 km
        $distancia = $this->service->haversine(0.0, 0.0, 0.0, 1.0);
        $this->assertEquals(111.19, $distancia);

        // Distancia a sí mismo debe ser 0.0 km
        $distanciaCero = $this->service->haversine(5.31, -73.81, 5.31, -73.81);
        $this->assertEquals(0.0, $distanciaCero);
    }

    public function test_select_top_vulnerable_prioritizes_higher_vulnerability_and_tie_breaks_by_proximity(): void
    {
        $puntoCero = ['lat' => 5.3100, 'lng' => -73.8100];

        $veredas = [
            ['id' => 1, 'nombre' => 'Baja Vuln', 'lat' => 5.3110, 'lng' => -73.8110, 'vulnerabilidad' => 3],
            ['id' => 2, 'nombre' => 'Media Vuln', 'lat' => 5.3120, 'lng' => -73.8120, 'vulnerabilidad' => 6],
            ['id' => 3, 'nombre' => 'Muy Alta Vuln', 'lat' => 5.3200, 'lng' => -73.8200, 'vulnerabilidad' => 10],
            ['id' => 4, 'nombre' => 'Alta Vuln Lejos', 'lat' => 5.5000, 'lng' => -73.5000, 'vulnerabilidad' => 8], // lejos
            ['id' => 5, 'nombre' => 'Alta Vuln Cerca', 'lat' => 5.3105, 'lng' => -73.8105, 'vulnerabilidad' => 8], // cerca (gana desempate)
            ['id' => 6, 'nombre' => 'Alta Vuln Media', 'lat' => 5.3500, 'lng' => -73.8500, 'vulnerabilidad' => 8], // medio
            ['id' => 7, 'nombre' => 'Alta Vuln 4', 'lat' => 5.3800, 'lng' => -73.8800, 'vulnerabilidad' => 8],
        ];

        $top5 = $this->service->selectTopVulnerable($veredas, $puntoCero);

        $this->assertCount(5, $top5);

        $ids = array_column($top5, 'id');
        // El id 3 (vuln 10) debe ser el primero
        $this->assertEquals(3, $ids[0]);

        // Entre los de vuln 8 (ids 5, 6, 7, 4), el más cercano al punto cero (id 5) debe estar antes que id 4
        $posId5 = array_search(5, $ids);
        $posId4 = array_search(4, $ids);
        $this->assertLessThan($posId4, $posId5);

        // Id 1 (vuln 3) y Id 2 (vuln 6) no deben quedar entre los 5 seleccionados
        $this->assertNotContains(1, $ids);
        $this->assertNotContains(2, $ids);
    }

    public function test_nearest_neighbor_orders_correctly_from_punto_cero(): void
    {
        // Punto cero en origen
        $puntoCero = ['lat' => 0.0, 'lng' => 0.0];

        // 3 puntos alineados en latitud 0:
        // A en 1 grado (~111 km del origen)
        // B en 3 grados (~333 km del origen, ~111 km de C)
        // C en 2 grados (~222 km del origen, ~111 km de A y de B)
        $veredas = [
            ['id' => 'B', 'nombre' => 'Punto B', 'lat' => 0.0, 'lng' => 3.0, 'vulnerabilidad' => 8],
            ['id' => 'A', 'nombre' => 'Punto A', 'lat' => 0.0, 'lng' => 1.0, 'vulnerabilidad' => 8],
            ['id' => 'C', 'nombre' => 'Punto C', 'lat' => 0.0, 'lng' => 2.0, 'vulnerabilidad' => 8],
        ];

        $resultado = $this->service->nearestNeighbor($veredas, $puntoCero);

        $this->assertEquals('nearest_neighbor_haversine', $resultado['algoritmo']);
        $this->assertCount(3, $resultado['ruta']);

        // El orden esperado desde 0.0 debe ser A (más cercano al origen), luego C (más cercano a A), luego B
        $this->assertEquals('A', $resultado['ruta'][0]['id']);
        $this->assertEquals(1, $resultado['ruta'][0]['orden']);
        $this->assertEquals(111.19, $resultado['ruta'][0]['distancia_desde_anterior_km']);

        $this->assertEquals('C', $resultado['ruta'][1]['id']);
        $this->assertEquals(2, $resultado['ruta'][1]['orden']);
        $this->assertEquals(111.19, $resultado['ruta'][1]['distancia_desde_anterior_km']);

        $this->assertEquals('B', $resultado['ruta'][2]['id']);
        $this->assertEquals(3, $resultado['ruta'][2]['orden']);
        $this->assertEquals(111.19, $resultado['ruta'][2]['distancia_desde_anterior_km']);

        $this->assertEquals(333.57, $resultado['distancia_total_km']);
    }
}

