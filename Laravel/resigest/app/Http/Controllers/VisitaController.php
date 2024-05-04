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
        if (!$residente) { //si no existe el residente volver atrás
            return redirect()->back();
        }

        return view('medico.formVisitas', ['residente' => $residente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fechaLimite = date('d-m-Y', strtotime('+1 month +1 day')); //este formato es el que se mostrará en los errores
        $fechaMinima = date('d-m-Y', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha' => ['date', 'after:' . $fechaMinima, 'before:' . $fechaLimite], //fecha minima hoy, fecha máxima dentro de un mes
        ]);

        $residente            = Residente::find($request->residente_id);
        $visita               = new Visita();
        $visita->fecha        = $request->fecha;
        $visita->hora         = $request->hora;
        $visita->residente_id = $request->residente_id;
        $visita->empleado_id  = $request->empleado_id;

        $visita->save();

        return redirect()->route('visitas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito; //no enviamos vistas para evitar el reenvio del formulario. Ruta de visitas del residente.

    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id_residente)
    {
        $visitas   = Visita::where('residente_id', $Id_residente)->orderByDesc('fecha')->get();
        $residente = Residente::find($Id_residente);
        if (!$residente) { //si no existe el residente volver atrás
            return redirect()->back();
        }

        return view('medico.visitas', ['visitas' => $visitas, 'residente' => $residente]); //envialos a la vista el residente y sus visitas

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $residente_id)
    {
        //

        $usuario = auth()->user(); //verificar si es el creador de la visita

        $residente = Residente::find($residente_id);
        $visita    = Visita::find($id);
        if (!$residente || !$visita) { //si no existe el residente volver atrás
            return redirect()->back();
        }

        if($usuario->id != $visita->empleado->user->id) {
            abort(403, 'No tienes autorización'); //mostrar vista de pagina no atorizada

        }

        return view('medico.formVisitas', ['visita' => $visita, 'residente' => $residente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fechaLimite = date('d-m-Y', strtotime('+1 month +1 day')); //este formato es el que se mostrará en los errores
        $fechaMinima = date('d-m-Y', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha' => ['date', 'after:' . $fechaMinima, 'before:' . $fechaLimite], //fecha minima hoy, fecha máxima dentro de un mes
        ]);

        $visita = Visita::find($id);

        $visita->fecha = $request->fecha;
        $visita->hora  = $request->hora;

        $visita->save();

        $residente = Residente::find($visita->residente_id);

        return redirect()->route('visitas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $visita = Visita::find($id);
        if (!$visita) { //si no existe el residente volver atrás
            return redirect()->back();
        }
        $visita->delete();

        $residente = Residente::find($visita->residente_id);

        return redirect()->route('visitas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito; //no enviamos vistas para evitar el reenvio del formulario al recargar. Ruta de visitas del residente.

    }

}
