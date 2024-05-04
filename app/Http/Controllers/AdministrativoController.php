<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cita\StoreAdministrativoRequest;
use App\Http\Requests\Cita\UpdateAdministrativoRequest;
use App\Models\Cita;
use App\Models\Ginecologo;
use App\Models\Expediente;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministrativoController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Administrativo $administrativo)
    {
        // Mostrar la vista con los detalles del administrativo
        return view('administrativos.show', compact('administrativo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrativo $administrativo)
    {
        // No se permite editar el administrativo, así que simplemente redireccionar a la vista de detalles
        return redirect()->route('administrativos.show', $administrativo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrativo $administrativo)
    {
        // No se permite actualizar el administrativo, así que simplemente redireccionar a la vista de detalles
        return redirect()->route('administrativos.show', $administrativo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrativo $administrativo)
    {
        // No se permite eliminar el administrativo
        return redirect()->route('administrativos.index')
                         ->with('error', 'No tiene permiso para eliminar el perfil.');
    }
}

