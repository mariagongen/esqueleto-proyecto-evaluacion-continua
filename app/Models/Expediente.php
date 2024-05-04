<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_apertura', 'fecha_cierre'];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function donantes()
    {
    return $this->belongsToMany(Donante::class);
    }

}


