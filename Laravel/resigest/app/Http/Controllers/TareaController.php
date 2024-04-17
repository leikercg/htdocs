<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Residente;
use App\Models\Empleado;

class TareaController extends Controller
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
        $residente  = Residente::find($id_residente);
        $auxiliares = Empleado::where('departamento_id', 5)->get(); //empleados del departamento 5, auxiliares

        return view('enfermeria.formTareas', ['residente' => $residente, 'auxiliares' => $auxiliares]); //envia al formulario de creación de tareas junto con el residente y los auxiliares.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $residente           = Residente::find($request->residente_id);
        $tarea               = new Tarea();
        $tarea->fecha        = $request->fecha;
        $tarea->Hora         = $request->hora;
        $tarea->residente_id = $request->residente_id;
        $tarea->empleado_id  = $request->empleado_id;
        $tarea->auxiliar_id  = $request->auxiliar_id;
        $tarea->descripcion  = $request->descripcion;

        $tarea->save();
        $tareas = Tarea::where('residente_id', $request->residente_id)->get(); //para devolver a la vista de las curas del residente
        return view('enfermeria.tareas', ['residente' => $residente, 'tareas' => $tareas]); //devolvemos el residente para mostar de nuevo las curas

    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id_residente)//envía a la vista de las tareas del residente
    {
        $tareas    = Tarea::where('residente_id', $Id_residente)->get();
        $residente = Residente::find($Id_residente);

        return view('enfermeria.tareas', ['tareas' => $tareas, 'residente' => $residente]); //envialos a la vista el residente y sus tareas

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tarea      = Tarea::find($id);
        $residente  = $tarea->residente;
        $auxiliares = Empleado::where('departamento_id', 5)->get(); //empleados del departamento 5, auxiliares

        return view('enfermeria.formTareas', ['residente' => $residente, 'auxiliares' => $auxiliares, 'tarea' => $tarea]); //envia al formulario de creación de tareas junto con el residente y los auxiliares.

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $residente          = Residente::find($request->residente_id);
        $tarea              = Tarea::find($id);
        $tarea->fecha       = $request->fecha;
        $tarea->Hora        = $request->hora;
        $tarea->auxiliar_id = $request->auxiliar_id;
        $tarea->descripcion = $request->descripcion;

        $tarea->save();
        $tareas = Tarea::where('residente_id', $request->residente_id)->get(); //para devolver a la vista de las curas del residente
        return view('enfermeria.tareas', ['residente' => $residente, 'tareas' => $tareas]); //devolvemos el residente para mostar de nuevo las curas

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tarea = Tarea::find($id);
        $tarea->delete();

    }
}
