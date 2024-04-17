<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cura;
use App\Models\Residente;


class CuraController extends Controller
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

        return view('enfermeria.formCuras', ['residente' => $residente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $residente            = Residente::find($request->residente_id);
        $cura               = new Cura();
        $cura->fecha        = $request->fecha;
        $cura->Hora         = $request->hora;
        $cura->residente_id = $request->residente_id;
        $cura->empleado_id  = $request->empleado_id;
        $cura->estado  = $request->estado;
        $cura->zona  = $request->zona;


        $cura->save();
        $curas = Cura::where('residente_id', $request->residente_id)->get(); //para devolver a la vista de las curas del residente
        return view('enfermeria.curas', ['residente' => $residente, 'curas' => $curas]); //devolvemos el residente para mostar de nuevo las curas

    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id_residente)
    {
        $curas  = Cura::where('residente_id', $Id_residente)->get();
        $residente = Residente::find($Id_residente);

        return view('enfermeria.curas', ['curas' => $curas, 'residente' => $residente]); //envialos a la vista el residente y sus curas

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $residente_id)
    {
        //
        $residente = Residente::find($residente_id);
        $cura    = Cura::find($id);

        return view('enfermeria.formCuras', ['cura' => $cura, 'residente' => $residente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cura = Cura::find($id);

        $cura->fecha = $request->fecha;
        $cura->hora  = $request->hora;
        $cura->estado  = $request->estado;

        $cura->save();

        $curas = Cura::all();

        $residente = Residente::find($cura->residente_id);

        return view('enfermeria.curas', ['curas' => $curas, 'residente' => $residente]); //envialos a la vista el residente y sus curas

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cura = Cura::find($id);
        $cura->delete();

        $curas = Cura::all();

        $residente = Residente::find($cura->residente_id);

        return view('enfermeria.curas', ['curas' => $curas, 'residente' => $residente]); //envialos a la vista el residente y sus sesiones

    }
}
