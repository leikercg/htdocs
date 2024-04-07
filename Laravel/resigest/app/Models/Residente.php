<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residente extends Model
{

    protected $fillable = [ //los definimos fillable para usar la asignación masiva
        'Id_residente',
        'Nombre',
        'Apellidos',
        'Habitacion',
        'Fecha_Nac',
    ];
    public $timestamps=true;
    protected $primaryKey = 'Id_residente'; //Al no seguir la convención de laravel indicamos la columna clave

    protected $keyType = 'string'; // Indicamos que no es num por que por defecto considera la id int incrementable, solo seleciona la parte numérica

    use HasFactory;
    public function grupos() //un residente puede tener varios grupos
    {
        return $this->belongsToMany(Grupo::class, 'residentes_grupos', 'Id_residente', 'Id_grupo');
        //parametros, nombre de la tabla que los relaciona, Fk local, FK
    }

    public function familiares()//un residente puede tener varios familiares
    {
        return $this->belongsToMany(Familiar::class, 'familiar_residente', 'Id_residente', 'Id_familiar');
        //parametros, nombre de la tabla que los relaciona, Fk local, FK
    }

    public function curas()//un residente puede tener varias curas
    {
        return $this->hasMany(Cura::class, 'Id_residente');
    }


    public function seguimientos()//un residente puede tener varios seguimientos
    {
        return $this->hasMany(Seguimiento::class, 'Id_residente');
    }

    public function sesiones() //un residente puede tener varias sesiones
    {
        return $this->hasMany(Sesion::class, 'Id_residente');
    }


    public function visitas()//un residente puede tener varias visitas
    {
        return $this->hasMany(Visita::class, 'Id_residente');
    }


    public function tareas()//un residente puede tener varias tareas asociadas
    {
        return $this->hasMany(Tarea::class, 'Id_residente');
    }

}
