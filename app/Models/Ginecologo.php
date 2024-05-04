<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 

class Ginecologo extends Model 
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password',
        'numero_colegiado',
        'telefono'
    ];

    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }

    public function citas(){
        return $this->hasMany(Expediente::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
