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

        $fechaLimite = date('Y-m-d', strtotime('+1 month'));
        $fechaMinima = date('Y-m-d', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha' => ['date', 'after:' . $fechaMinima, 'before:' . $fechaLimite], //fecha minima hoy, fecha máxima dentro de un mes
        ]);

        $residente            = Residente::find($request->residente_id);
        $sesion               = new Sesion();
        $sesion->fecha        = $request->fecha;
        $sesion->hora         = $request->hora;
        $sesion->residente_id = $request->residente_id;
        $sesion->empleado_id  = $request->empleado_id;

        $sesion->save();
        return redirect()->route('sesiones.residente', ['residente_id' => $residente->id]); //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id_residente)
    {
        $sesiones  = Sesion::where('residente_id', $Id_residente)->orderByDesc('fecha')->get();
        $residente = Residente::find($Id_residente);

        return view('fisioterapeuta.sesiones', ['sesiones' => $sesiones, 'residente' => $residente]); //envialos a la vista el residente y sus sesiones

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $residente_id)
    {
        //

        $usuario = auth()->user(); //verificar si es el creador de la sesion

        $residente = Residente::find($residente_id);
        $sesion    = Sesion::find($id);

        if($usuario->id != $sesion->empleado->user->id) {
            abort(403, 'No tienes autorización'); //mostrar vista de pagina no atorizada

        }

        return view('fisioterapeuta.formsesiones', ['sesion' => $sesion, 'residente' => $residente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $fechaLimite = date('Y-m-d', strtotime('+1 month'));
        $fechaMinima = date('Y-m-d', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha' => ['date', 'after:' . $fechaMinima, 'before:' . $fechaLimite], //fecha minima hoy, fecha máxima dentro de un mes
        ]);

        $sesion = Sesion::find($id);

        $sesion->fecha = $request->fecha;
        $sesion->hora  = $request->hora;

        $sesion->save();

        $residente = Residente::find($sesion->residente_id);

        return redirect()->route('sesiones.residente', ['residente_id' => $residente->id]); //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $sesion = Sesion::find($id);
        $sesion->delete();

        $residente = Residente::find($sesion->residente_id);

        return redirect()->route('sesiones.residente', ['residente_id' => $residente->id]); //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

    }
}
