<?php

return [
    // Punto cero simulado: Hospital El Salvador de Ubaté (ver README sección 7).
    'punto_cero' => [
        'lat' => 5.3085,
        'lng' => -73.8145,
        'nombre' => 'Hospital El Salvador de Ubaté',
    ],

    // Código institucional exigido para registrar cuentas de promotor / personal de salud.
    // Definirlo en producción con la variable de entorno PROMOTOR_REGISTRATION_CODE.
    'promotor_code' => env('PROMOTOR_REGISTRATION_CODE', 'RUTASALUD-2026'),
];

