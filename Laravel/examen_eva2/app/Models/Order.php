<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function employee() {//un pedido tiene un unico empleado
        return $this->belongsTo('App\Models\Employee');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function supplier() {//un pedido tiene un solo proveedor
        return $this->belongsTo('App\Models\Supplier');
    }
}
