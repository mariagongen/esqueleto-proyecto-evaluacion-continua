<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cita\StoreCitaRequest;
use App\Http\Requests\Cita\UpdateCitaRequest;
use App\Models\Cita;
use App\Models\Medicamento;
use App\Models\Ginecologo;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Cita::class);
        $citas = Cita::orderBy('fecha_hora', 'desc')->paginate(25);
        if(Auth::user()->es_ginecologo)
            $citas = Auth::user()->ginecologo->citas()->orderBy('fecha_hora', 'desc')->paginate(25);
        elseif(Auth::user()->es_paciente)
            $citas = Auth::user()->paciente->citas()->orderBy('fecha_hora', 'desc')->paginate(25);
        return view('/citas/index', ['citas' => $citas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Cita::class);
        $ginecologos = Ginecologo::all();
        $pacientes = Paciente::all();
        if(Auth::user()->es_ginecologo)
            return view('citas/create', ['ginecologo' => Auth::user()->ginecologo, 'pacientes' => $pacientes]);
        elseif(Auth::user()->es_paciente)
            return view('citas/create', ['paciente' => Auth::user()->paciente, 'ginecologos' => $ginecologos]);
        return view('citas/create', ['pacientes' => $pacientes, 'ginecologos' => $ginecologos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCitaRequest $request)
    {
        $request->validate([
            'fecha_hora' => 'required|date',
            'ginecologo_id' => 'required|exists:ginecologo,id',
            'paciente_id' => 'required|exists:pacientes,id',
        ]);
    
        Cita::create($request->all());
    
        return redirect()->route('citas.index')
                         ->with('success', 'Cita creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        $this->authorize('view', $cita);
        return view('citas/show', ['cita' => $cita]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        $this->authorize('update', $cita);

        $medicos = Medico::all();
        $pacientes = Paciente::all();
        if(Auth::user()->es_ginecologo){
            return view('citas/edit', ['cita' => $cita, 'ginecologo' => Auth::user()->ginecologo, 'pacientes' => $pacientes]);
        }
        elseif(Auth::user()->es_paciente) {
            return view('citas/edit', ['cita' => $cita, 'paciente' => Auth::user()->paciente, 'ginecologos' => $ginecologos]);
        }
        return view('citas/edit', ['cita' => $cita, 'pacientes' => $pacientes, 'ginecologos' => $ginecologos]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCitaRequest $request, Cita $cita)
    {
        //Lo valida en un request?
        $cita->fill($request->validated());
        $cita->save();
        session()->flash('success', 'Cita modificada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $this->authorize('delete', $cita);
        if($cita->delete())
            session()->flash('success', 'Cita borrado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        else
            session()->flash('warning', 'La cita no pudo borrarse. Es probable que se deba a que tenga asociada información como citas que dependen de él.');
        return redirect()->route('citas.index');
    }
}


