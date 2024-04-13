<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

/////////////////////////////////////////////////////////////////////////////////
//ENFERMERIA
    public function curas() { //un empleado realiza varias curas
        return $this->hasMany(Cura::class);
    }

    public function tareas() //un empleado puede tener varias tareas
    {
        return $this->hasMany(Tarea::class);
    }
/////////////////////////////////////////////////////////////////////////////////
//TODOS
    public function departamento() { //un empleado pertenece a un departamento
        return $this->belongsTo(Departamento::class);
    }



/////////////////////////////////////////////////////////////////////////////////
//TARAPIA
    public function grupos() //un empleado puede tener varios grupos
    {
        return $this->hasMany(Grupo::class);
    }



/////////////////////////////////////////////////////////////////////////////////
//FISIOTERÁPIA
    public function sesiones()//un empleado puede tener varias sesiones
    {
        return $this->hasMany(Sesion::class);
    }


/////////////////////////////////////////////////////////////////////////////////
//MEDICINA
    public function visitas()//un empleado puede tener varias visitas
    {
        return $this->hasMany(Visita::class);
    }

    public function user() //cada empleado tiene un unico usuario
    {
        return $this->belongsTo(User::class,'dni');
        }
}
