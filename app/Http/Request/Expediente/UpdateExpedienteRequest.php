<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Expediente;

class UpdateExpedienteRequest extends FormRequest
{
    public function authorize()
    {
        // Verifica si el usuario actual es un ginecólogo
        if (Auth::user()->esGinecologo()) {
            // Obtiene el id del paciente del expediente que se está actualizando
            $pacienteId = $this->route('expediente')->paciente_id; 
            //El ginecologo no podrá visualizar pacientes que no sean suyos, es redundante?

            // Verifica si el ginecólogo es el médico asignado al paciente del expediente
            return Auth::user()->id === Expediente::find($pacienteId)->ginecologo_id;
        }
        
        // Si el usuario no es un ginecólogo, no tiene permiso para actualizar el expediente
        return false;
    }

    public function rules()
    {
        return [
            'fecha_apertura' => 'required|date',
            'fecha_cierre' => 'nullable|date|after_or_equal:fecha_apertura',
        ];
    }
}


