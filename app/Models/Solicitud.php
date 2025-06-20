<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

     //Relacion una solicitud pertenece a un cliente

    public  function cliente(){
        return $this->belongsTo(Cliente::class);

    }
    //Relacion  una solicitud tiene muchos servicios
    public function servicio(){
    return $this->belongsTo(Servicio::class);
}

public function pago()
{
    return $this->hasOne(Pago::class);
}


}
