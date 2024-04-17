<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    public function residentes()
    {
        return $this->belongsToMany(Residente::class, 'residentes_grupos', 'grupo_id', 'residente_id');
        //parametros, nombre de la tabla que los relaciona, k local, FK
    }

    public function empleado() // un grupo solo puede tener un empleado
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

}
