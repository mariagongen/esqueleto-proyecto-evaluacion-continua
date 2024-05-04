<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    use HasFactory;

    protected $fillable = ['sexo', 'aptitud', 'estado_salud', 'edad', 'fecha_donacion'];

    // Define el tipo de datos para la fecha de donación
    protected $dates = ['fecha_donacion'];

    public function expedientes()
    {
    return $this->belongsToMany(Expediente::class);
    }

}


