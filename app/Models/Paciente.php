<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Paciente extends Model  
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'nuhsa', 
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'user_id'
    ];

    
    public function ginecologo()
    {
        return $this->belongsTo(Ginecologo::class);
    }


    public function expedientes()
    {
        return $this->hasMany(Expediente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

