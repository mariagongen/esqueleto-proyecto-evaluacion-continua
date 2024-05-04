<?php

namespace App\Http\Requests\Paciente;

use App\Models\Paciente;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
    
        if ($user->esPaciente()) {
            // Permitir al paciente actualizar solo ciertos campos
            $camposPermitidos = ['password', 'telefono', 'dirección'];
    
            // Verificar si los campos actualizados están dentro de los campos permitidos
            $camposActualizados = array_keys($this->validated());
    
            foreach ($camposActualizados as $campoActualizado) {
                if (!in_array($campoActualizado, $camposPermitidos)) {
                    return false; // Campo no permitido
                }
            }
    
            return true; // Todos los campos actualizados son permitidos
        }
    
        // Si no es un paciente, verificar los permisos para actualizar al paciente
        $paciente = Paciente::find($this->route('paciente'))->first();
        return $paciente && $this->user()->can('update', $paciente);
    }
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'nuhsa' => 'required|numeric|unique:users',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|numeric',
            'dirección' => 'string|max:255',
        ];
    }
}
