<?php

namespace App\Policies;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CitaPolicy
{

    private function esCitaPropiaDeGinecólogo(User $user, Cita $cita): bool
    {
        return $user->es_ginecologo && $cita->ginecologo_id == $user->ginecologo->id;
    }

    private function esCitaPropiaDePaciente(User $user, Cita $cita): bool
    {
        return $user->es_paciente && $cita->paciente_id == $user->paciente->id;
    }

    private function esCitaPropia(User $user, Cita $cita): bool
    {
        return $this->esCitaPropiaDeGinecólogo($user, $cita) || $this->esCitaPropiaDePaciente($user, $cita);
    }
    
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Cita $cita): bool
    {
        return $this->esCitaPropiaDePaciente($user, $cita);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->es_ginecologo;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Cita $cita): bool
    {
        return $user->es_ginecologo && $this->esCitaPropiaDeGinecólogo($user, $cita);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Cita $cita): bool
    {
        return $user->es_administrador || $this->esCitaPropia($user, $cita);
    }

}

