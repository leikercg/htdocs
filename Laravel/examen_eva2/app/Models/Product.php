<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Product extends Model
{
    use HasFactory;

    public function supplier() {
        return $this->belongsTo('App\Models\Supplier');
    }

    public function order()//un producto tiene un pedido
    {
        return $this->hasOne('App\Models\Order');
    }
}
