<?php

namespace App\Policies;

use App\Models\Ginecologo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GinecologoPolicy
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
    public function view(User $user, Ginecologo $ginecologo): bool
    {
        if ($user->es_administrativo) {
            return true; // Los administrativos pueden ver todos los ginecólogos
        } elseif ($user->es_paciente) {
            // Los pacientes solo pueden ver al ginecólogo asociado a ellos
            return $user->paciente->ginecologo_id == $ginecologo->id;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->es_administrativo; // Solo los administrativos pueden crear ginecólogos
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ginecologo $ginecologo): bool
    {
        return $user->es_administrativo; // Solo los administrativos pueden actualizar ginecólogos
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ginecologo $ginecologo): bool
    {
        return $user->es_administrativo; // Solo los administrativos pueden eliminar ginecólogos
    }
}
