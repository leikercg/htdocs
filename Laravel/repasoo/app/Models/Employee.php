<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function contacts()/*esto define el nombre*/
    {
        return $this->hasMany('App\Models\Contact');
    }
}
