<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    public function empleado()//un visita solo puede pertenecer a un empleado
    {
        return $this->belongsTo(Empleado::class, 'Id_empleado');
    }

    public function residente()//una visita solo puede pertenecer a un residente
    {
        return $this->belongsTo(Residente::class, 'Id_residente');
    }
}
