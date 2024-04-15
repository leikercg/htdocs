<?php

namespace App\Http\Controllers;

use App\Models\Residente;
use Illuminate\Http\Request;
use App\Models\Visita;

class VisitaController extends Controller
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

        return view('medico.formVisitas', ['residente' => $residente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $residente            = Residente::find($request->residente_id);
        $visita               = new Visita();
        $visita->Fecha        = $request->fecha;
        $visita->Hora         = $request->hora;
        $visita->residente_id = $request->residente_id;
        $visita->empleado_id  = $request->empleado_id;

        $visita->save();
        $visitas = Visita::where('residente_id', $request->residente_id)->get(); //para devolver a la vista de las visitas del residente
        return view('medico.visitas', ['residente' => $residente, 'visitas' => $visitas]); //devolvemos el residente para mostar de nuevo las visitas

    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id_residente)
    {
        $visitas   = Visita::where('residente_id', $Id_residente)->get();
        $residente = Residente::find($Id_residente);

        return view('medico.visitas', ['visitas' => $visitas, 'residente' => $residente]); //envialos a la vista el residente y sus visitas

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $residente_id)
    {
        //
        $residente = Residente::find($residente_id);
        $visita    = Visita::find($id);

        return view('medico.formVisitas', ['visita' => $visita, 'residente' => $residente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visita = Visita::find($id);

        $visita->Fecha = $request->fecha;
        $visita->Hora  = $request->hora;

        $visita->save();

        $visitas = Visita::all();

        $residente = Residente::find($visita->residente_id);

        return view('medico.visitas', ['visitas' => $visitas, 'residente' => $residente]); //envialos a la vista el residente y sus visitas

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $visita = Visita::find($id);
        $visita->delete();

        $visitas = Visita::all();

        $residente = Residente::find($visita->residente_id);

        return view('medico.visitas', ['visitas' => $visitas, 'residente' => $residente]); //envialos a la vista el residente y sus visitas

    }

}
