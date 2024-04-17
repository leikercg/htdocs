<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    public function residente()//una tarea solo puede tener un residente
    {
        return $this->belongsTo(Residente::class, 'residente_id');
    }

    public function empleado()//una tarea pertenece solo a un empleado
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
