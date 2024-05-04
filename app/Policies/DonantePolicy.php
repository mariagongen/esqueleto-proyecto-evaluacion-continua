<?php

namespace App\Policies;

use App\Models\Donante;
use App\Models\User;
use App\Models\Expediente;
use Illuminate\Auth\Access\Response;

class DonantePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->es_ginecologo || $user->es_administrativo || $user->es_paciente;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Donante $donante): bool
    {
        if ($user->es_ginecologo || $user->es_administrativo) {
            return true; // Los ginecólogos y administrativos pueden ver todos los donantes
        } elseif ($user->es_paciente) {
            // Los pacientes pueden ver el donante solo si está asociado a un expediente propio del paciente
            $expediente = Expediente::where('paciente_id', $user->paciente->id)->first();
            return $expediente && $expediente->donante_id === $donante->id;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->es_administrativo; // Solo los administrativos pueden crear donantes
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Donante $donante): bool
    {
        return $user->es_ginecologo; // Solo los ginecólogos pueden actualizar donantes
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Donante $donante): bool
    {
        return $user->es_administrativo; // Solo los administrativos pueden eliminar donantes
    }
}


