<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    //Relacion  Un cliente tiene muchos servicios

    public function solicitud(){
        return $this->hasMany(Solicitud::class);
    }

     // Relación con Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
