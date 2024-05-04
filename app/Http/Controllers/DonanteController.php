<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cita\StoreDonanteRequest;
use App\Http\Requests\Cita\UpdateDonanteRequest;
use App\Models\Cita;
use App\Models\Medicamento;
use App\Models\Ginecologo;
use App\Models\Expediente;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los donantes
        $donantes = Donante::all();
        
        // Devolver vista con la lista de donantes
        return view('donantes.index', compact('donantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo donante
        return view('donantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'sexo' => 'required|string',
            'aptitud' => 'required|string',
            'estado_salud' => 'required|string',
            'edad' => 'required|integer',
            'fecha_donacion' => 'required|date',
        ]);
        
        // Crear un nuevo donante con los datos proporcionados
        Donante::create($request->all());

        // Redireccionar al usuario a la página de índice de donantes con un mensaje de éxito
        return redirect()->route('donantes.index')
                         ->with('success', 'Donante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donante $donante)
    {
        // Mostrar la vista con los detalles del donante
        return view('donantes.show', compact('donante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donante $donante)
    {
        // Mostrar el formulario de edición con los datos del donante
        return view('donantes.edit', compact('donante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donante $donante)
    {
        // Validar los datos del formulario
        $request->validate([
            'sexo' => 'required|string',
            'aptitud' => 'required|string',
            'estado_salud' => 'required|string',
            'edad' => 'required|integer',
            'fecha_donacion' => 'required|date',
        ]);

        // Actualizar los datos del donante con los datos proporcionados
        $donante->update($request->all());

        // Redireccionar al usuario a la página de índice de donantes con un mensaje de éxito
        return redirect()->route('donantes.index')
                         ->with('success', 'Donante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donante $donante)
    {
        // Eliminar el donante de la base de datos
        $donante->delete();

        // Redireccionar al usuario a la página de índice de donantes con un mensaje de éxito
        return redirect()->route('donantes.index')
                         ->with('success', 'Donante eliminado exitosamente.');
    }
}

