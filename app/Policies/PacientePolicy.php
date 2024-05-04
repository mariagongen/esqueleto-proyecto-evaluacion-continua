<?php

namespace App\Policies;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PacientePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->es_administrativo;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Paciente $paciente): bool
    {
        if ($user->es_administrativo) {
            return true; // Los administrativos pueden ver todos los pacientes
        } elseif ($user->es_ginecologo) {
            // Los ginecólogos solo pueden ver a los pacientes asignados a ellos
            return $user->ginecologo->id == $paciente->ginecologo_id;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->es_administrativo; // Solo los administrativos pueden crear pacientes
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Paciente $paciente): bool
    {
        return $user->es_administrativo; // Solo los administrativos pueden actualizar pacientes
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Paciente $paciente): bool
    {
        return $user->es_administrativo; // Solo los administrativos pueden eliminar pacientes
    }
}
