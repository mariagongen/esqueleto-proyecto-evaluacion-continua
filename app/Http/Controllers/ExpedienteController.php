<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cita\StoreExpedienteRequest;
use App\Http\Requests\Cita\UpdateExpedienteRequest;
use App\Models\Cita;
use App\Models\Medicamento;
use App\Models\Ginecologo;
use App\Models\Paciente;
use App\Models\Donante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los expedientes
        $expedientes = Expediente::all();

        // Devolver vista con la lista de expedientes
        return view('expedientes.index', compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo expediente
        return view('expedientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            // Agrega aquí las reglas de validación según sea necesario
        ]);

        // Crear un nuevo expediente con los datos proporcionados
        Expediente::create($request->all());

        // Redireccionar al usuario a la página de índice de expedientes con un mensaje de éxito
        return redirect()->route('expedientes.index')
                         ->with('success', 'Expediente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expediente $expediente)
    {
        // Mostrar la vista con los detalles del expediente
        return view('expedientes.show', compact('expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expediente $expediente)
    {
        // Mostrar el formulario de edición con los datos del expediente
        return view('expedientes.edit', compact('expediente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expediente $expediente)
    {
        // Validar los datos del formulario
        $request->validate([
            // Agrega aquí las reglas de validación según sea necesario
        ]);

        // Actualizar los datos del expediente con los datos proporcionados
        $expediente->update($request->all());

        // Redireccionar al usuario a la página de índice de expedientes con un mensaje de éxito
        return redirect()->route('expedientes.index')
                         ->with('success', 'Expediente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expediente $expediente)
    {
        // Eliminar el expediente de la base de datos
        $expediente->delete();

        // Redireccionar al usuario a la página de índice de expedientes con un mensaje de éxito
        return redirect()->route('expedientes.index')
                         ->with('success', 'Expediente eliminado exitosamente.');
    }

    public function attach_medicamento(Request $request, Expediente $expediente)
    {
        // Valido en el controlador directamente en vez de en una form request separada porque necesito validar añadiendo un nombre al bag de errores.
        // Necesito añadir un nombre al bag de attach porque la vista de edit tiene 2 formularios, cada uno pudiento tener errores de validación, así que asociamos un nombre a uno de ellos para poder diferenciar
        // En la vista accederemos a los errores de validación de este formulario a través del nombre del bag
        $this->validateWithBag('attach', $request, [

            //Poner los atributos
            'medicamento_id' => 'required|exists:medicos,id',
            'inicio' => 'required|date',
            'fin' => 'required|date|after:inicio',
            'comentarios' => 'nullable|string',
            'tomas_dia' => 'required|numeric|min:0',
        ]);
        $expediente->medicamentos()->attach($request->medicamento_id, [

            //Poner los atributos
            'inicio' => $request->inicio,
            'fin' => $request->fin,
            'comentarios' => $request->comentarios,
            'tomas_dia' => $request->tomas_dia
        ]);
        return redirect()->route('expedientes.edit', $expediente->id);
    }

    public function detach_medicamento(Expediente $expediente, Medicamento $medicamento)
    {
        $expediente->medicamentos()->detach($medicamento->id);
        return redirect()->route('expediente.edit', $expediente->id);
    }

}

