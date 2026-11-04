<?php

namespace App\Policies;

use App\Models\Solicitud;
use App\Models\User;

class SolicitudPolicy
{
    /** Cualquier usuario autenticado con rol ciudadano puede radicar solicitudes. */
    public function create(User $user): bool
    {
        return $user->isCiudadano();
    }

    /** El solicitante ve la suya; el personal de salud ve todas. */
    public function view(User $user, Solicitud $solicitud): bool
    {
        return $user->isPromotor() || $solicitud->user_id === $user->id;
    }

    /** Solo el solicitante puede cancelar, y únicamente mientras esté pendiente. */
    public function cancel(User $user, Solicitud $solicitud): bool
    {
        return $solicitud->user_id === $user->id && $solicitud->estado === 'pendiente';
    }

    /** Solo personal de salud programa o marca como atendida una solicitud. */
    public function manage(User $user, Solicitud $solicitud): bool
    {
        return $user->isPromotor();
    }
}

