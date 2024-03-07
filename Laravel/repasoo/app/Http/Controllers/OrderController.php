<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //

    public function mostrar(Request $r)
    {

        $data['employee'] = DB::table("employees")->where('id', '=', $r->employee_id)->get()->first();//por que solo queremos el primero y sabemos que solo devuelve uno
        $data['product']  = DB::table("products")->where('id', '=', $r->product_id)->get()->first();
        $data['cantidad'] = $r->cantidad;


        return view('order.mostrar',$data); //muestra el empleado de la id pasada
    }

    public function create()
    {
        $data['employees'] = DB::table("employees")->get();
        $data['products']  = DB::table("products")->get();
        return view('order.form', $data); //muestra el formulario para crear empleado
    }

}
