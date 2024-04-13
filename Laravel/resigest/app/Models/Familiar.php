<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{



    protected $table = 'familiares'; //Daba error por no indicar el nombre explícitamente de la tabla, buscaba en "familiars" y esa no existe

    use HasFactory;
    public function residentes() //un familiar puede tener varios residentes
    {
        return $this->belongsToMany(Residente::class,'familiares_residentes');//en caso de no seguir la convencion indicar asi
        //tabla pivot(si s)
    }

    public function user() //cada empleado tiene un unico usuario
    {
        return $this->belongsTo(User::class,'dni');
    }
    public function departamento() { //un familiar pertenece a un departamento
        return $this->belongsTo(Departamento::class);
    }
}
