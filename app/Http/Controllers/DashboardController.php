<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Redirige al panel correspondiente según el rol del usuario autenticado.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if ($user->isPromotor()) {
            return redirect()->route('dashboard.promotor');
        }

        return redirect()->route('dashboard.user');
    }

    /**
     * Muestra el panel operativo para personal de salud y promotores.
     */
    public function promotor(Request $request): View
    {
        Gate::authorize('view-promotor-dashboard');

        return view('dashboards.promotor');
    }

    /**
     * Muestra el panel ciudadano / familiar.
     */
    public function user(Request $request): View
    {
        Gate::authorize('view-user-dashboard');

        return view('dashboards.user');
    }
}

