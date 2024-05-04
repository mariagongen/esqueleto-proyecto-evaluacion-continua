<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;


    protected $fillable = ['fecha_hora', 'medico_id', 'paciente_id'];

    protected $casts = [
        'fecha_hora' => 'datetime:Y-m-d H:i',
    ];

    public function medico(){
        return $this->belongsTo(Medico::class);
    }

    public function expediente(){
        return $this->belongsTo(Expediente::class);
    }

}

