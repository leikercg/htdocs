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
    public function create(string $id_residente) //VALIDADO YA EN EL MIDLEAWARE
    {
        $residente = Residente::find($id_residente);

        return view('enfermeria.formCuras', ['residente' => $residente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $fechaLimite = date('d-m-Y', strtotime('+1 month +1 day')); //este formato es el que se mostrará en los errores
        $fechaMinima = date('d-m-Y', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha' => ['date', 'after:'.$fechaMinima, 'before:' . $fechaLimite],//fecha minima hoy, fecha máxima dentro de un mes
        ]);

        $residente          = Residente::find($request->residente_id);
        $cura               = new Cura();
        $cura->fecha        = $request->fecha;
        $cura->Hora         = $request->hora;
        $cura->residente_id = $request->residente_id;
        $cura->empleado_id  = $request->empleado_id;
        $cura->estado       = $request->estado;
        $cura->zona         = $request->zona;

        $cura->save();

        return redirect()->route('curas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id_residente)
    {
        $curas     = Cura::where('residente_id', $Id_residente)->orderByDesc('fecha')->get();
        $residente = Residente::find($Id_residente);

        return view('enfermeria.curas', ['curas' => $curas, 'residente' => $residente]); //envialos a la vista el residente y sus curas

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $residente_id)
    {
        //
        $usuario = auth()->user();

        $residente = Residente::find($residente_id);
        $cura      = Cura::find($id);

        if($usuario->id != $cura->empleado->user->id) {
            abort(403, 'No tienes autorización'); //mostrar vista de pagina no atorizada

        }

        return view('enfermeria.formCuras', ['cura' => $cura, 'residente' => $residente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $fechaLimite = date('d-m-Y', strtotime('+1 month +1 day')); //este formato es el que se mostrará en los errores
        $fechaMinima = date('d-m-Y', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha' => ['date', 'after:'.$fechaMinima, 'before:' . $fechaLimite],//fecha minima hoy, fecha máxima dentro de un mes
        ]);

        $cura = Cura::find($id);

        $cura->fecha  = $request->fecha;
        $cura->hora   = $request->hora;
        $cura->estado = $request->estado;

        $cura->save();

        $residente = Residente::find($cura->residente_id);

        return redirect()->route('curas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cura = Cura::find($id);
        $cura->delete();

        $residente = Residente::find($cura->residente_id);

        return redirect()->route('curas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

    }
}
