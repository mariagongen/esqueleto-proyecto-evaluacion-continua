<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;
    
    protected $fillable = ['num_id'];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

    public function ginecologos()
    {
        return $this->hasMany(Ginecologo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deleteProfile()
    {
        // Elimina el perfil del administrativo
        $this->user->delete();
        $this->delete();
    }

    public function createGinecologo(array $data)
    {
        // Crea un nuevo ginecólogo
        $ginecologo = Ginecologo::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'num_colegiado' => $data['num_colegiado'],
        ]);

        return $ginecologo;
    }

    public function createDonante(array $data)
    {
        // Crea un nuevo donante
        $donante = Donante::create([
            'sexo' => $data['sexo'],
            'aptitud' => $data['aptitud'],
            'estado_salud' => $data['estado_salud'],
            'edad' => $data['edad'],
            'fecha_donacion' => $data['fecha_donacion'],
        ]);

        return $donante;
    }

}

