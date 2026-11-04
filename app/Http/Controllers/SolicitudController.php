<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Services\VeredaCatalogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SolicitudController extends Controller
{
    public const SERVICIOS = [
        'Control de tensión / medicina habitual',
        'Revisión médica para adulto mayor',
        'Vacunación o control infantil',
        'Control prenatal / gestante',
        'Malestar general o dolor continuo',
        'Dificultad de movilidad para salir de la finca',
    ];

    public function store(Request $request, VeredaCatalogService $catalogo): RedirectResponse
    {
        Gate::authorize('create', Solicitud::class);

        $data = $request->validate([
            'vereda_id' => ['required', 'integer'],
            'paciente' => ['required', 'string', 'max:120'],
            'tipo_servicio' => ['required', Rule::in(self::SERVICIOS)],
            'urgencia' => ['required', Rule::in(array_keys(Solicitud::URGENCIAS))],
            'direccion_referencia' => ['nullable', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string', 'max:1000'],
        ], [
            'vereda_id.required' => 'Selecciona tu vereda.',
            'paciente.required' => 'Indica quién necesita la visita.',
            'tipo_servicio.required' => 'Selecciona el motivo de la atención.',
        ]);

        $vereda = $catalogo->find((int) $data['vereda_id']);

        if (! $vereda) {
            throw ValidationException::withMessages(['vereda_id' => 'La vereda seleccionada no existe.']);
        }

        Solicitud::create([
            'user_id' => $request->user()->id,
            'vereda_id' => $vereda['id'],
            'vereda_nombre' => $vereda['nombre'],
            'lat' => $vereda['lat'],
            'lng' => $vereda['lng'],
            'paciente' => $data['paciente'],
            'tipo_servicio' => $data['tipo_servicio'],
            'direccion_referencia' => $data['direccion_referencia'] ?? null,
            'descripcion' => $data['descripcion'] ?? null,
            'urgencia' => $data['urgencia'],
            'prioridad' => Solicitud::calcularPrioridad((int) $vereda['vulnerabilidad'], $data['urgencia']),
            'estado' => 'pendiente',
        ]);

        return redirect()->route('dashboard.user')
            ->with('status', 'Tu solicitud fue radicada y ya es visible para el equipo de salud.');
    }

    public function cancel(Solicitud $solicitud): RedirectResponse
    {
        Gate::authorize('cancel', $solicitud);

        $solicitud->update(['estado' => 'cancelada']);

        return redirect()->route('dashboard.user')->with('status', 'Solicitud cancelada.');
    }

    public function updateEstado(Request $request, Solicitud $solicitud): RedirectResponse
    {
        Gate::authorize('manage', $solicitud);

        $data = $request->validate([
            'estado' => ['required', Rule::in(['pendiente', 'programada', 'atendida'])],
            'fecha_programada' => ['nullable', 'required_if:estado,programada', 'date', 'after_or_equal:today'],
        ]);

        $solicitud->update([
            'estado' => $data['estado'],
            'fecha_programada' => $data['estado'] === 'pendiente' ? null : ($data['fecha_programada'] ?? $solicitud->fecha_programada),
            'promotor_id' => $request->user()->id,
        ]);

        return redirect()->route('dashboard.promotor')->with('status', 'Solicitud #'.$solicitud->id.' actualizada a "'.$data['estado'].'".');
    }
}

