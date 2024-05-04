<?php

namespace App\Policies;

use App\Models\Expediente;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExpedientePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->es_administrativo) {
            // Los administrativos solo pueden ver los expedientes con fecha de cierre establecida
            return Expediente::whereNotNull('fecha_cierre')->exists();
        }
        return $user->es_ginecologo || $user->es_paciente;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Expediente $expediente): bool
    {
        return $user->es_ginecologo || $user->es_administrativo || $user->es_paciente; 
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->es_ginecologo; // Solo los médicos pueden crear expedientes
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Expediente $expediente): bool
    {
        return $user->es_ginecologo; // Solo los médicos pueden actualizar expedientes
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Expediente $expediente): bool
    {
        return $user->es_ginecologo; // Solo el ginecólogo puede eliminar el expediente
    }
}
