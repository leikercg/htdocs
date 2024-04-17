<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residente;
use App\Models\Sesion;

class SesionController extends Controller
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
    public function create(string $id_residente)
    {
        $residente = Residente::find($id_residente);

        return view('fisioterapeuta.formSesiones', ['residente' => $residente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $residente            = Residente::find($request->residente_id);
        $sesion               = new Sesion();
        $sesion->fecha        = $request->fecha;
        $sesion->hora         = $request->hora;
        $sesion->residente_id = $request->residente_id;
        $sesion->empleado_id  = $request->empleado_id;

        $sesion->save();
        $sesiones = Sesion::where('residente_id', $request->residente_id)->get(); //para devolver a la vista de las sesiones del residente
        return view('fisioterapeuta.sesiones', ['residente' => $residente, 'sesiones' => $sesiones]); //devolvemos el residente para mostar de nuevo las sesiones

    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id_residente)
    {
        $sesiones   = Sesion::where('residente_id', $Id_residente)->get();
        $residente = Residente::find($Id_residente);

        return view('fisioterapeuta.sesiones', ['sesiones' => $sesiones, 'residente' => $residente]); //envialos a la vista el residente y sus sesiones

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $residente_id)
    {
        //
        $residente = Residente::find($residente_id);
        $sesion    = Sesion::find($id);

        return view('fisioterapeuta.formsesiones', ['sesion' => $sesion, 'residente' => $residente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sesion = Sesion::find($id);

        $sesion->fecha = $request->fecha;
        $sesion->hora  = $request->hora;

        $sesion->save();

        $sesiones = Sesion::all();

        $residente = Residente::find($sesion->residente_id);

        return view('fisioterapeuta.sesiones', ['sesiones' => $sesiones, 'residente' => $residente]); //envialos a la vista el residente y sus sesiones

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $sesion = Sesion::find($id);
        $sesion->delete();

        $sesiones = Sesion::all();

        $residente = Residente::find($sesion->residente_id);

        return view('fisioterapeuta.sesiones', ['sesiones' => $sesiones, 'residente' => $residente]); //envialos a la vista el residente y sus sesiones

    }
}
