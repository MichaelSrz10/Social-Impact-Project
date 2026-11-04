<?php

namespace Tests\Unit;

use Tests\TestCase;

class VeredasDatasetTest extends TestCase
{
    public function test_veredas_json_exists_and_has_12_valid_records(): void
    {
        $path = base_path('database/data/veredas.json');
        $this->assertFileExists($path);

        $json = file_get_contents($path);
        $this->assertJson($json);

        $data = json_decode($json, true);
        $this->assertIsArray($data);
        $this->assertCount(12, $data);

        $ids = [];
        foreach ($data as $vereda) {
            $this->assertArrayHasKey('id', $vereda);
            $this->assertArrayHasKey('nombre', $vereda);
            $this->assertArrayHasKey('lat', $vereda);
            $this->assertArrayHasKey('lng', $vereda);
            $this->assertArrayHasKey('vulnerabilidad', $vereda);

            $this->assertIsInt($vereda['id']);
            $this->assertIsString($vereda['nombre']);
            $this->assertIsNumeric($vereda['lat']);
            $this->assertIsNumeric($vereda['lng']);
            $this->assertIsInt($vereda['vulnerabilidad']);

            $this->assertGreaterThanOrEqual(-90, $vereda['lat']);
            $this->assertLessThanOrEqual(90, $vereda['lat']);
            $this->assertGreaterThanOrEqual(-180, $vereda['lng']);
            $this->assertLessThanOrEqual(180, $vereda['lng']);
            $this->assertGreaterThanOrEqual(1, $vereda['vulnerabilidad']);
            $this->assertLessThanOrEqual(10, $vereda['vulnerabilidad']);

            $ids[] = $vereda['id'];
        }

        // Todos los IDs deben ser únicos
        $this->assertCount(12, array_unique($ids));
    }
}
