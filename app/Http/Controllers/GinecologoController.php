<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ginecologo; // Importa el modelo Ginecologo

class GinecologoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $ginecologos = Ginecologo::paginate(10);
    dd($ginecologos); // Muestra los datos recuperados de la base de datos antes de pasarlos a la vista
    return view('ginecologos.index', compact('ginecologos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo ginecólogo
        return view('ginecologos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users', // Ensures unique email across users table
            'password' => 'required|string|min:8', // Enforces minimum password length
            'numero_colegiado' => 'required|string|unique:ginecologos', // Unique colegiado number
            'telefono' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $ginecologo = Ginecologo::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Securely hash password
            'numero_colegiado' => $request->numero_colegiado,
            'telefono' => $request->telefono,
        ]);

        // Additional logic for user creation or association can be placed here
        // (consider using Laravel's auth scaffolding for user management)

        return redirect()->route('ginecologos.index')->with('success', 'Ginecólogo creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ginecologo $ginecologo)
    {
        // Mostrar la vista con los detalles del ginecólogo
        return view('ginecologos.show', compact('ginecologo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ginecologo $ginecologo)
    {
        // Mostrar el formulario de edición con los datos del ginecólogo
        return view('ginecologos.edit', compact('ginecologo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ginecologo $ginecologo)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $ginecologo->id, // Ensures unique email excluding current record
            'password' => 'nullable|string|min:8', // Allow empty password for keeping existing value
            'numero_colegiado' => 'required|string|unique:ginecologos,numero_colegiado,' . $ginecologo->id, // Unique colegiado number excluding current record
            'telefono' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $ginecologo->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $ginecologo->password, // Update password only if provided
            'numero_colegiado' => $request->numero_colegiado,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('ginecologos.index')->with('success', 'Ginecólogo actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ginecologo $ginecologo)
    {
        // Eliminar el ginecólogo de la base de datos
        $ginecologo->delete();

        // Redireccionar al usuario a la página de índice de ginecólogos con un mensaje de éxito
        return redirect()->route('ginecologos.index')
                         ->with('success', 'Ginecólogo eliminado exitosamente.');
    }
}
