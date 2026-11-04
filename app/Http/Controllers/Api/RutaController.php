<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptimizarRutaRequest;
use App\Http\Resources\RutaResource;
use App\Services\RouteOptimizerService;

class RutaController extends Controller
{
    public function __construct(
        protected RouteOptimizerService $optimizerService
    ) {}

    /**
     * Optimiza la ruta seleccionando las 5 veredas más vulnerables y ordenándolas
     * con Vecino Más Cercano (Haversine).
     */
    public function optimizar(OptimizarRutaRequest $request): RutaResource
    {
        $validated = $request->validated();

        $resultado = $this->optimizerService->optimize(
            $validated['veredas'],
            $validated['punto_cero']
        );

        return new RutaResource($resultado);
    }
}

