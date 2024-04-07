<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function contact() {
        return $this->hasMany('App\Models\Contact');
    }

    public function orders() {//un empleado tiene varios pedidos
        return $this->hasMany('App\Models\Order');
    }
}
