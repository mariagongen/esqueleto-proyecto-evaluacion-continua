<?php

namespace App\Http\Requests\Ginecologo;

use App\Models\Ginecologo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGinecologoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $ginecologo = Ginecologo::find($this->route('medico'))->first();
        return $ginecologo && $this->user()->can('update', $ginecologo);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'num_colegiado' => 'required|numeric',
            'telefono' => 'required|numeric',
        ];
    }
}
