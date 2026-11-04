<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Services\RouteOptimizerService;
use App\Services\VeredaCatalogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Redirige al panel correspondiente según el rol del usuario autenticado.
     */
    public function index(Request $request): RedirectResponse
    {
        if ($request->user()->isPromotor()) {
            return redirect()->route('dashboard.promotor');
        }

        return redirect()->route('dashboard.user');
    }

    /**
     * Panel operativo: solicitudes reales y ruta sugerida según ubicación y prioridad.
     */
    public function promotor(Request $request, RouteOptimizerService $optimizer): View
    {
        Gate::authorize('view-promotor-dashboard');

        $filtro = $request->query('estado', 'activas');

        $query = Solicitud::with(['solicitante:id,name,email', 'promotor:id,name'])
            ->orderByDesc('prioridad')
            ->orderBy('created_at');

        $query = match ($filtro) {
            'todas' => $query,
            'pendiente', 'programada', 'atendida', 'cancelada' => $query->where('estado', $filtro),
            default => $query->whereIn('estado', ['pendiente', 'programada']),
        };

        $solicitudes = $query->get();

        // Ruta: una parada por vereda con demanda activa, ponderada por la mayor prioridad registrada.
        $activas = Solicitud::with('solicitante:id,name,email')
            ->whereIn('estado', ['pendiente', 'programada'])
            ->get();

        $veredas = $activas->groupBy('vereda_id')->map(fn ($grupo) => [
            'id' => $grupo->first()->vereda_id,
            'nombre' => $grupo->first()->vereda_nombre,
            'lat' => $grupo->first()->lat,
            'lng' => $grupo->first()->lng,
            'vulnerabilidad' => (int) $grupo->max('prioridad'),
        ])->values()->all();

        $puntoCero = config('rutasalud.punto_cero');

        $ruta = $veredas ? $optimizer->optimize($veredas, $puntoCero) : null;

        $porVereda = $activas->groupBy('vereda_id');
        $paradas = $ruta ? array_map(function (array $parada) use ($porVereda) {
            $parada['solicitudes'] = $porVereda->get($parada['id'], collect())->sortByDesc('prioridad')->values();

            return $parada;
        }, $ruta['ruta']) : [];

        $idsEnRuta = array_column($paradas, 'id');
        $fueraDeRuta = collect($veredas)->reject(fn ($v) => in_array($v['id'], $idsEnRuta, true))->values();

        return view('dashboards.promotor', [
            'solicitudes' => $solicitudes,
            'filtro' => $filtro,
            'ruta' => $ruta,
            'paradas' => $paradas,
            'fueraDeRuta' => $fueraDeRuta,
            'puntoCero' => $puntoCero,
            'stats' => [
                'pendientes' => Solicitud::where('estado', 'pendiente')->count(),
                'programadas' => Solicitud::where('estado', 'programada')->count(),
                'atendidas' => Solicitud::where('estado', 'atendida')->count(),
                'criticas' => $activas->where('prioridad', '>=', 11)->count(),
            ],
        ]);
    }

    /**
     * Panel ciudadano: solicitudes propias y su estado.
     */
    public function user(Request $request, VeredaCatalogService $catalogo): View
    {
        Gate::authorize('view-user-dashboard');

        $solicitudes = Solicitud::with('promotor:id,name')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('dashboards.user', [
            'solicitudes' => $solicitudes,
            'veredas' => $catalogo->all(),
            'servicios' => SolicitudController::SERVICIOS,
            'proxima' => $solicitudes->firstWhere('estado', 'programada'),
        ]);
    }
}
