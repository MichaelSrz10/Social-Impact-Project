<?php

namespace App\Http\Middleware;

use App\Models\AuditLog;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class AuditoriaRuta
{
    /**
     * Claves sensibles que nunca deben persistirse en la auditoría.
     *
     * @var array<int, string>
     */
    protected array $forbiddenKeys = [
        'password',
        'password_confirmation',
        'contrasena',
        'token',
        'access_token',
        'refresh_token',
        'secret',
        'authorization',
        'bearer',
    ];

    /**
     * Maneja la solicitud entrante registrando la auditoría completa antes de responder.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $parametrosLimpios = $this->sanitizeData($request->all());

        // 1. Crear el registro preliminar para obtener su ID
        $auditLog = AuditLog::create([
            'user_id' => $user?->id,
            'endpoint' => $request->path(),
            'ip' => $request->ip(),
            'parametros' => $parametrosLimpios,
            'resultado' => null,
            'status_code' => 500,
        ]);

        // 2. Inyectar el ID de auditoría en los atributos del request para el Resource
        $request->attributes->set('audit_id', $auditLog->id);

        try {
            $response = $next($request);
        } catch (Throwable $e) {
            $auditLog->update([
                'status_code' => 500,
                'resultado' => ['error' => 'Internal Server Error'],
            ]);

            throw $e;
        }

        // 3. Procesar respuesta e incorporar audit_id en el cuerpo final si corresponde
        $statusCode = $response->getStatusCode();
        $resultadoFinal = null;

        if ($response instanceof JsonResponse) {
            $data = $response->getData(true);

            if (is_array($data)) {
                if (isset($data['meta']) && is_array($data['meta'])) {
                    $data['meta']['audit_id'] = $auditLog->id;
                    $response->setData($data);
                }
                $resultadoFinal = $this->sanitizeData($data);
            }
        } else {
            $content = $response->getContent();
            $decoded = json_decode((string) $content, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                if (isset($decoded['meta']) && is_array($decoded['meta'])) {
                    $decoded['meta']['audit_id'] = $auditLog->id;
                    $response->setContent(json_encode($decoded));
                }
                $resultadoFinal = $this->sanitizeData($decoded);
            } else {
                $resultadoFinal = ['content' => $content];
            }
        }

        // 4. Actualizar el registro con el resultado final y código HTTP
        $auditLog->update([
            'status_code' => $statusCode,
            'resultado' => $resultadoFinal,
        ]);

        return $response;
    }

    /**
     * Limpia datos recursivamente para no almacenar contraseñas ni tokens.
     */
    protected function sanitizeData(mixed $data): mixed
    {
        if (! is_array($data)) {
            return $data;
        }

        $sanitized = [];
        foreach ($data as $key => $value) {
            $lowerKey = strtolower((string) $key);
            if (in_array($lowerKey, $this->forbiddenKeys, true)) {
                continue;
            }

            $sanitized[$key] = is_array($value) ? $this->sanitizeData($value) : $value;
        }

        return $sanitized;
    }
}

