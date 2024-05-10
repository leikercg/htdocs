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
    public function create(string $id_residente) //VALIDADO YA EN EL MIDLEAWARE // Método lanzar el formulario de creación de curas
    {
        $residente = Residente::find($id_residente);

        if (!$residente) { //si no existe el residente volver atrás
            return redirect()->back();
        }

        return view('enfermeria.formCuras', ['residente' => $residente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Método para almacenar la cura en la base de datos
    {

        $fechaLimite = date('d-m-Y', strtotime('+1 month +1 day')); //este formato es el que se mostrará en los errores
        $fechaMinima = date('d-m-Y', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha' => ['date', 'after:' . $fechaMinima, 'before:' . $fechaLimite], //fecha minima hoy, fecha máxima dentro de un mes
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
    public function show(string $Id_residente) // Método para ver las curas de un residente
    {

        $curas     = Cura::where('residente_id', $Id_residente)->orderByDesc('fecha')->get(); // Obtenemos las curas ordenadas por fecha
        $residente = Residente::find($Id_residente);
        if (!$residente) {//si no existe volver atrás
            return redirect()->back();
        }

        return view('enfermeria.curas', ['curas' => $curas, 'residente' => $residente]); //envialos a la vista el residente y sus curas

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $residente_id) // Método para lanzar el formulario de edición de una cura
    {
        //
        $usuario = auth()->user(); // obtenemos el usuario para verificar que es el creador

        $residente = Residente::find($residente_id);
        $cura      = Cura::find($id);
        if (!$residente || !$cura) {//si no existe la cura o el residente volver atrás
            return redirect()->back();
        }
        if($usuario->id != $cura->empleado->user->id) {
            abort(403, 'No tienes autorización'); //mostrar vista de pagina no atorizada

        }

        return view('enfermeria.formCuras', ['cura' => $cura, 'residente' => $residente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // Método para actualizar la base de datos
    {

        $fechaLimite = date('d-m-Y', strtotime('+1 month +1 day')); //este formato es el que se mostrará en los errores
        $fechaMinima = date('d-m-Y', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha' => ['date', 'after:' . $fechaMinima, 'before:' . $fechaLimite], //fecha minima hoy, fecha máxima dentro de un mes
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
    public function destroy(string $id) //Método para eliminar una cura
    {
        //
        $cura = Cura::find($id);
        if (!$cura) { //si no existe el residente volver atrás
            return redirect()->back();
        }

        $cura->delete();

        $residente = Residente::find($cura->residente_id);

        return redirect()->route('curas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

    }
}
