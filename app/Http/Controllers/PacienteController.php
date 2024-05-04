<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Support\Str; // Importar la clase Str

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:pacientes',
            // Agrega otras reglas de validación según sea necesario
        ]);
    
        // Obtener el ID del usuario autenticado
        $userId = auth()->id();

        // Generar una contraseña aleatoria
        $password = Str::random(8);

        // Crear un nuevo paciente con la contraseña generada y el ID de usuario
        $paciente = new Paciente([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($password), // Hash de la contraseña generada
            'nuhsa' => $request->nuhsa,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'user_id' => $userId // Asignar el ID del usuario autenticado
        ]);


        // Guardar el paciente en la base de datos
        $paciente->save();

        return redirect()->route('pacientes.index')
                        ->with('success', 'Paciente creado exitosamente. La contraseña es: ' . $password);
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            // Ver reglas de validación
        ]);

        $paciente->update($request->all());

        return redirect()->route('pacientes.index')
                         ->with('success', 'Paciente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
                         ->with('success', 'Paciente eliminado exitosamente.');
    }

    public function mostrarPerfil()
    {
        $paciente = auth()->user();

        return view('perfil', ['paciente' => $paciente]);
    }
}
