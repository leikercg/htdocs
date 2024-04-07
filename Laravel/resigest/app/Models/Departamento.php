<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public function empleados() { //un departamento tiene varias empleados
        return $this->hasMany(Empleado::class, 'id_departamento');
    }

    public function seguimientos()//un departamento tiene varios seguimientos
    {
        return $this->hasMany(Seguimiento::class, 'Id_departamento');
    }
}
