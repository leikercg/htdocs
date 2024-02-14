<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    //
    public function __invoke()
    {
        return "Hola, mundo";
    }
    public function show($nombre) {
        $data['nombre'] = $nombre;
        return view('hola', $data);
    }
    public function saludo($nombre, $apellido) {
        // Acceder a los valores de los parámetros $nombre y $apellido
        $data['nombre'] = $nombre;
        $data['apellido'] = $apellido;

        // Realizar alguna lógica con los parámetros y devolver una respuesta
        return view('holaCompleto', $data); // este metodo envia a la vista holaCompleto los datos para ser mostrados
    }



}
