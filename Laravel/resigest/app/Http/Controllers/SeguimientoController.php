<?php

namespace App\Http\Controllers;

use App\Models\Residente;
use Illuminate\Http\Request;
use App\Models\Seguimiento;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * //modificamos el meotodo que devuelve una seguimiento en concreto para que nos devuelva todos los de un residente
     */
    public function show(string $Id_residente, string $Id_departamento)
    {
        $residente= Residente::find($Id_residente);
        $seguimientos = $residente->seguimientos;
        $seguimiento=null;//solo para pruebas seeder, BORRAAAAAR
        foreach($seguimientos as $seguimientoLista){
            if($seguimientoLista->departamento->id==$Id_departamento){
               $seguimiento=$seguimientoLista;
            }
        }

        return view('seguimiento.seguimiento', ['seguimiento' => $seguimiento,'residente'=>$residente]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
