<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptimizarRutaRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para la optimización de ruta.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'punto_cero' => ['required', 'array'],
            'punto_cero.lat' => ['required', 'numeric', 'between:-90,90'],
            'punto_cero.lng' => ['required', 'numeric', 'between:-180,180'],

            'veredas' => ['required', 'array', 'min:5', 'max:15'],
            'veredas.*.id' => ['required', 'distinct'],
            'veredas.*.nombre' => ['required', 'string', 'max:255'],
            'veredas.*.lat' => ['required', 'numeric', 'between:-90,90'],
            'veredas.*.lng' => ['required', 'numeric', 'between:-180,180'],
            'veredas.*.vulnerabilidad' => ['required', 'integer', 'between:1,10'],
        ];
    }

    /**
     * Mensajes de validación en español.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'punto_cero.required' => 'El punto cero es obligatorio.',
            'punto_cero.array' => 'El punto cero debe ser un objeto válido con lat y lng.',
            'punto_cero.lat.required' => 'La latitud del punto cero es obligatoria.',
            'punto_cero.lat.numeric' => 'La latitud del punto cero debe ser numérica.',
            'punto_cero.lat.between' => 'La latitud del punto cero debe estar entre -90 y 90 grados.',
            'punto_cero.lng.required' => 'La longitud del punto cero es obligatoria.',
            'punto_cero.lng.numeric' => 'La longitud del punto cero debe ser numérica.',
            'punto_cero.lng.between' => 'La longitud del punto cero debe estar entre -180 y 180 grados.',

            'veredas.required' => 'La lista de veredas es obligatoria.',
            'veredas.array' => 'Las veredas deben ser un arreglo.',
            'veredas.min' => 'Debe enviar al menos :min veredas.',
            'veredas.max' => 'No puede enviar más de :max veredas.',

            'veredas.*.id.required' => 'El id de cada vereda es obligatorio.',
            'veredas.*.id.distinct' => 'Los ids de las veredas no pueden repetirse.',
            'veredas.*.nombre.required' => 'El nombre de cada vereda es obligatorio.',
            'veredas.*.nombre.string' => 'El nombre de la vereda debe ser texto.',
            'veredas.*.lat.required' => 'La latitud de cada vereda es obligatoria.',
            'veredas.*.lat.numeric' => 'La latitud de cada vereda debe ser numérica.',
            'veredas.*.lat.between' => 'La latitud de cada vereda debe estar entre -90 y 90 grados.',
            'veredas.*.lng.required' => 'La longitud de cada vereda es obligatoria.',
            'veredas.*.lng.numeric' => 'La longitud de cada vereda debe ser numérica.',
            'veredas.*.lng.between' => 'La longitud de cada vereda debe estar entre -180 y 180 grados.',
            'veredas.*.vulnerabilidad.required' => 'El nivel de vulnerabilidad es obligatorio.',
            'veredas.*.vulnerabilidad.integer' => 'El nivel de vulnerabilidad debe ser un número entero.',
            'veredas.*.vulnerabilidad.between' => 'La vulnerabilidad debe estar entre 1 y 10.',
        ];
    }
}

