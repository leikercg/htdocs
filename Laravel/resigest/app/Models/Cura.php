<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cura extends Model
{
    use HasFactory;
    public function empleado() //una cura pertenece a un empleado en particular
    {
        return $this->belongsTo(Empleado::class); //id se refiere a la clave foránea en la tabla curas-> aparece asi en la bbdd
    }

    public function residente() //una cura pertenece a un empleado en particular
    {
        return $this->belongsTo(Residente::class); //id_residente se refiere a la clave foránea de la tabla-> aparece asi en la bbdd
    }

    /*belongsTo se indica la clave foranea  que relaciona las tablas en la tabla actual.
        es decir, ¿Que columna de la tabla actual relaciona las tablas?

    hasMany se indica la clave foranea que relaciona las tablas en la tabla relacionada.
        ¿Qué columna de la tabla relacional relaciona las tabals?
     */
}
