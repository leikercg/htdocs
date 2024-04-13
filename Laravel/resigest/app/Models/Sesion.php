<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;
    protected $table = 'sesiones'; //Daba error por no indicar el nombre explícitamente de la tabla, buscaba en "sesions" y esa no existe

    public function residente() //uns sesion puede tener solo un residente
    {
        return $this->belongsTo(Residente::class);
    }

    public function empleado()// una sesión solo pertenece a un empleado
    {
        return $this->belongsTo(Empleado::class);
    }
}
