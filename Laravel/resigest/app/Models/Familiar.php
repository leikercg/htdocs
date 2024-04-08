<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{

    protected $primaryKey = 'Id_familiar'; //Al no seguir la convención de laravel indicamos la columna clave

    protected $keyType = 'string'; // Indicamos que no es num por que por defecto considera la id int incrementable, solo seleciona la parte numérica

    protected $table = 'familiares'; //Daba error por no indicar el nombre explícitamente de la tabla, buscaba en "familiars" y esa no existe

    use HasFactory;
    public function residentes() //un familiar puede tener varios residentes
    {
        return $this->belongsToMany(Residente::class, 'familiar_residente', 'Id_familiar', 'Id_residente');
    }

    public function user() //cada empleado tiene un unico usuario
    {
        return $this->hasOne(User::class, 'Id_familiar', 'dni'); //(tabla local, tabla referencia)
    }
    public function departamento() { //un familiar pertenece a un departamento
        return $this->belongsTo(Departamento::class,'Id_departamento');
    }
}
