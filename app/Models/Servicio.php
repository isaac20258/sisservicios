<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    //relacion

    public function solicitud()
    {
        return $this->hasMany(Solicitud::class);
    }
}
