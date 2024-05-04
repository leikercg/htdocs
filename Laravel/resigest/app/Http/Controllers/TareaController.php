<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Residente;
use App\Models\Empleado;
use Dompdf\Dompdf;

//exportar clase Date

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
        if (!$residente) { //si no existe el residente volver atrás
            return redirect()->back();
        }
        $auxiliares = Empleado::where('departamento_id', 5)->get(); //empleados del departamento 5, auxiliares

        return view('enfermeria.formTareas', ['residente' => $residente, 'auxiliares' => $auxiliares]); //envia al formulario de creación de tareas junto con el residente y los auxiliares.
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
            'auxiliar_id' => ['required'],

        ]);

        $residente           = Residente::find($request->residente_id);
        $tarea               = new Tarea();
        $tarea->fecha        = $request->fecha;
        $tarea->Hora         = $request->hora;
        $tarea->residente_id = $request->residente_id;
        $tarea->empleado_id  = $request->empleado_id;
        $tarea->auxiliar_id  = $request->auxiliar_id;
        $tarea->descripcion  = $request->descripcion;

        $tarea->save();

        return redirect()->route('tareas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id_residente)//envía a la vista de las tareas del residente
    {
        $tareas    = Tarea::where('residente_id', $Id_residente)->orderByDesc('fecha')->orderBy('hora')->get();
        $residente = Residente::find($Id_residente);
        if (!$residente) { //si no existe el residente volver atrás
            return redirect()->back();
        }

        $auxiliares = Empleado::where('departamento_id', 5)->get(); //empleados del departamento 5, auxiliares

        return view('enfermeria.tareas', ['tareas' => $tareas, 'residente' => $residente, 'auxiliares' => $auxiliares]); //envialos a la vista el residente y sus tareas

    }

    public function showAuxiliar(string $auxiliar_id)//envía a la vista de las tareas del residente
    {

        $fechaActual = now()->toDateString(); //Fecha de actual en string para compararla

        $tareas = Tarea::where('auxiliar_id', $auxiliar_id)->get();
        $tareas = Tarea::where('fecha', $fechaActual)->orderByDesc('fecha')->orderBy('hora')->get();

        $auxiliar = Empleado::find($auxiliar_id);
        if (!$auxiliar) { //si no existe el auxiliar volver atrás
            return redirect()->back();
        }

        $auxiliares = Empleado::where('departamento_id', 5)->get(); //empleados del departamento 5, auxiliares

        return view('auxiliar.tareas', ['tareas' => $tareas, 'auxiliares' => $auxiliares, 'auxiliar' => $auxiliar]); //envialos a la vista el residente y sus tareas @@@@@borrar auxiliares, solo para pruebas
    }


    public function imprimirAuxiliar(){


        if(auth()->user()->departamento_id != 5) { //no es auxiliar
            return redirect()->back();
        }
        $auxiliar_id=auth()->user()->empleado->id;
        $fechaActual = now()->toDateString(); //Fecha de actual en string para compararla

        $tareas = Tarea::where('auxiliar_id', $auxiliar_id)->get();
        $tareas = Tarea::where('fecha', $fechaActual)->orderByDesc('fecha')->orderBy('hora')->get();

        $auxiliar = Empleado::find($auxiliar_id);

        $auxiliares = Empleado::where('departamento_id', 5)->get(); //empleados del departamento 5, auxiliares

       $html = view('imprimir.auxiliar', ['tareas' => $tareas, 'auxiliares' => $auxiliares, 'auxiliar' => $auxiliar]); //envialos a la vista el residente y sus tareas @@@@@borrar auxiliares, solo para pruebas


       $dompdf = new Dompdf();
       $dompdf->loadHtml($html);
       $dompdf->setPaper('A4', 'portrait');

       $dompdf->render();
       return $dompdf->stream('agenda.pdf', ['Attachment' => false]); //con true se descargaria automáticamente
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $usuario = auth()->user(); //verificar si es el creador de la sesión

        $tarea      = Tarea::find($id);
        if (!$tarea) { //si no existe la tearea volver atrás
            return redirect()->back();
        }
        $residente  = $tarea->residente;
        $auxiliares = Empleado::where('departamento_id', 5)->get(); //empleados del departamento 5, auxiliares

        if($usuario->id != $tarea->empleado->user->id) {
            abort(403, 'No tienes autorización'); //mostrar vista de pagina no atorizada
        }
        return view('enfermeria.formTareas', ['residente' => $residente, 'auxiliares' => $auxiliares, 'tarea' => $tarea]); //envia al formulario de creación de tareas junto con el residente y los auxiliares.

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fechaLimite = date('d-m-Y', strtotime('+1 month +1 day')); //este formato es el que se mostrará en los errores
        $fechaMinima = date('d-m-Y', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha'       => ['date', 'after:' . $fechaMinima, 'before:' . $fechaLimite], //fecha minima hoy, fecha máxima dentro de un mes
            'auxiliar_id' => ['required'],
        ]);

        $residente          = Residente::find($request->residente_id);
        $tarea              = Tarea::find($id);
        $tarea->fecha       = $request->fecha;
        $tarea->Hora        = $request->hora;
        $tarea->auxiliar_id = $request->auxiliar_id;
        $tarea->descripcion = $request->descripcion;

        $tarea->save();

        return redirect()->route('tareas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $residente_id)
    {
        //
        $tarea = Tarea::find($id);
        if (!$tarea) { //si no existe la tarea volver atrás
            return redirect()->back();
        }

        $tarea->delete();

        $residente = Residente::find($residente_id);

        return redirect()->route('tareas.residente', ['residente_id' => $residente])->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.

        //
    }
}
