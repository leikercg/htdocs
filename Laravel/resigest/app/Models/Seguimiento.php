<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    public function residente()//un segumiento solo tiene un residente
    {
        return $this->belongsTo(Residente::class);
    }


    public function departamento()//un seguimiento pertenece a un departamento
    {
    return $this->belongsTo(Departamento::class);
}
}
