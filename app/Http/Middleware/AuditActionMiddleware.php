<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuditActionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // 1. Dejamos que la petición siga su curso normal
        $response = $next($request);

        // 2. Registramos la auditoría solo si el usuario ha iniciado sesión y la petición no es de solo lectura (GET)
        if (auth()->check() && $request->method() !== 'GET') {
            $user = auth()->user()->email;
            $method = $request->method(); // POST, PUT, DELETE
            $url = $request->fullUrl();
            $ip = $request->ip();

            // Registramos la acción. Por ahora se guarda en el archivo laravel.log
            // Mañana, si hay tiempo, cambiaremos esta línea para que guarde en una tabla 'audit_logs' de la base de datos.
            Log::info("Auditoría de Seguridad - Usuario: {$user} | Acción: {$method} en {$url} | IP: {$ip}");
        }

        return $response;
    }
}