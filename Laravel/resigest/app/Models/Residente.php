<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residente extends Model
{

    protected $fillable = [ //los definimos fillable para usar la asignación masiva
        'dni',
        'nombre',
        'apellidos',
        'habitacion',
        'fecha_nac',
    ];
    public $timestamps=true;
    protected $keyType = 'string'; // Indicamos que no es num por que por defecto considera la id int incrementable, solo seleciona la parte numérica

    use HasFactory;
    public function grupos() //un residente puede tener varios grupos
    {
        return $this->belongsToMany(Grupo::class, 'residentes_grupos', 'residente_id', 'grupo_id');
        //parametros, nombre de la tabla que los relaciona, local, FK
    }

    public function familiares()//un residente puede tener varios familiares
    {
        return $this->belongsToMany(Familiar::class, 'familiares_residentes', );
        //parametros (nombre de la tabla que los relaciona, k local, FK)
        //el nombre de la BBDD no sigue la convencio por la que hay que indicarla, debería ser femiliar_residente).
    }

    public function curas()//un residente puede tener varias curas
    {
        return $this->hasMany(Cura::class);
    }


    public function seguimientos()//un residente puede tener varios seguimientos
    {
        return $this->hasMany(Seguimiento::class);
    }

    public function sesiones() //un residente puede tener varias sesiones
    {
        return $this->hasMany(Sesion::class);
    }


    public function visitas()//un residente puede tener varias visitas
    {
        return $this->hasMany(Visita::class);
    }


    public function tareas()//un residente puede tener varias tareas asociadas
    {
        return $this->hasMany(Tarea::class, 'residente_id');
    }

}
