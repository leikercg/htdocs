<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public function empleados() { //un departamento tiene varias empleados
        return $this->hasMany(Empleado::class, 'departamento_id');//si no seguimos la convención (clave foranea en la tabla relacionada)
    }

    public function seguimientos()//un departamento tiene varios seguimientos
    {
        return $this->hasMany(Seguimiento::class, 'departamento_id');
    }
}
