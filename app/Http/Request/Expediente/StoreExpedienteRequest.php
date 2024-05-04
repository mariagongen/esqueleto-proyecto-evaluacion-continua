<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreExpedienteRequest extends FormRequest
{
    public function authorize()
    {
        // Verifica si el usuario actual es un ginecólogo
        if (Auth::user()->esGinecologo()) {
            // Verifica si el paciente asociado al expediente es el paciente del ginecólogo
            $pacienteId = $this->input('paciente_id');
            return Auth::user()->id === Paciente::find($pacienteId)->ginecologo_id;
        }
        
        // Si el usuario no es un ginecólogo, no tiene permiso para crear un expediente
        return false;
    }

    public function rules()
    {
        return [
            'fecha_apertura' => 'required|date',
            'fecha_cierre' => 'nullable|date|after_or_equal:fecha_apertura',
            'paciente_id' => 'required|exists:pacientes,id', // Asegura que el paciente exista en la base de datos
        ];
    }
}
