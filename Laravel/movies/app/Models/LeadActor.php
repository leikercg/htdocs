<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadActor extends Model
{
    use HasFactory;
    // Este leadActor pertenece a un usuario de la clase Movie
    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }
}
