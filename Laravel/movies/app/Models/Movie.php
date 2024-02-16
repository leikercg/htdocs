<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    // Este usuario tiene un elemento email de la clase Director
    public function director()
    {
        return $this->hasOne('App\Models\Director');
    }
    // Este usuario tiene un elemento email de la clase LeadActor
    public function leadActor()
    {
        return $this->hasOne('App\LeadActor');
    }
    /*
    public function directors() {//esta clase tienen una relacion n:n
        return $this->belongsToMany('App\Directors');//en la otra se copia y pega los mismo
    }*/

    public function writer()
    {
        return $this->hasMany('App\Writer'); //return $this->hasMany('App\Writer','claveForanea')
    } // ATENCIÓN: hemos tenido que indicar el nombre de la clave foránea
    // (idUsuario) porque no habíamos respetado la convención de Laravel
    // (usuario_id) al crear la tabla de artículos


    //esto es cuando la relación es 1:N
    public function genres()
    {
        return $this->belongsTo('App\Genres');
    }

}
