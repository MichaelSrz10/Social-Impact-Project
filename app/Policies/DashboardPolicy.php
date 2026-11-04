<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DashboardPolicy
{
    use HandlesAuthorization;

    /**
     * Determina si el usuario puede acceder al panel operativo de promotores / personal de salud.
     */
    public function viewPromotor(User $user): bool
    {
        return $user->isPromotor();
    }

    /**
     * Determina si el usuario puede acceder al panel ciudadano / paciente.
     */
    public function viewUser(User $user): bool
    {
        return $user->isCiudadano();
    }
}

