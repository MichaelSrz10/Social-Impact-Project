<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiManagerService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        // Tomamos la llave desde el archivo .env por seguridad
        $this->apiKey = env('GEMINI_API_KEY'); 
        // URL base de Gemini 1.5 Flash (ideal por su velocidad y capa gratuita)
        $this->baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent';
    }

    /**
     * Envía un prompt a la IA y retorna la respuesta en texto.
     */
    public function analyzeSocialIssue(string $prompt): ?string
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}?key={$this->apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            if ($response->successful()) {
                // Navegamos por el JSON de respuesta de Google Gemini
                return $response->json('candidates.0.content.parts.0.text');
            }

            // Si falla, guardamos el error en los logs de Laravel para depuración
            Log::error('Error en la API de Gemini: ' . $response->body());
            return 'No se pudo procesar la solicitud con la IA en este momento.';

        } catch (\Exception $e) {
            Log::error('Excepción al conectar con Gemini: ' . $e->getMessage());
            return 'Ocurrió un error interno de conexión.';
        }
    }
}