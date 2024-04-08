<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
/////////////////////////////////////////////////////////////////////////////////
//ENFERMERIA
    public function curas() { //un empleado realiza varias curas
        return $this->hasMany(Cura::class, 'id_empleado');
    }

    public function tareas() //un empleado puede tener varias tareas
    {
        return $this->hasMany(Tarea::class, 'Id_empleado');
    }
/////////////////////////////////////////////////////////////////////////////////
//TODOS
    public function departamento() { //un empleado pertenece a un departamento
        return $this->belongsTo(Departamento::class,'Id_departamento');
    }



/////////////////////////////////////////////////////////////////////////////////
//TARAPIA
    public function grupos() //un empleado puede tener varios grupos
    {
        return $this->hasMany(Grupo::class, 'Id_empleado');
    }



/////////////////////////////////////////////////////////////////////////////////
//FISIOTERÁPIA
    public function sesiones()//un empleado puede tener varias sesiones
    {
        return $this->hasMany(Sesion::class, 'Id_empleado');
    }


/////////////////////////////////////////////////////////////////////////////////
//MEDICINA
    public function visitas()//un empleado puede tener varias visitas
    {
        return $this->hasMany(Visita::class, 'Id_empleado');
    }

    public function user() //cada empleado tiene un unico usuario
    {
        return $this->hasOne(User::class, 'id', 'dni'); //(tabla local, tabla referencia)
        }
}
