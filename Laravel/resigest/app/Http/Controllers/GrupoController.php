<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Residente_Grupo;
use Illuminate\Http\Request;
use App\Models\Residente;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //envia todos los grupos a la vista
    {
        //
        $grupos = Grupo::orderByDesc('fecha')->get();

        return view('terapeuta.todosGrupos', ['grupos' => $grupos]);
    }

    public function gruposResidente(string $residente_id) //envia todos los grupos a la vista
    {
        //

        $residente = Residente::find($residente_id);
        if (!$residente) { //si no existe el residente volver atrás
            return redirect()->back();
        }

        $grupos = $residente->grupos->sortByDesc('fecha');
        return view('terapeuta.residenteGrupos', ['grupos' => $grupos, 'residente' => $residente]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() //enviar a la vista de creación de grupos, validado por el middleware del departamento
    {
        //
        $residentes = Residente::where('estado', 'alta')->get();

        return view('terapeuta.formGrupos', ['residentes' => $residentes]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //almacenar el grupo en la bbdd, se debe ademas rellenar los datos en la tabla pivot para usar las relaciones de eloquent
    {

        $fechaLimite = date('d-m-Y', strtotime('+1 month +1 day')); //este formato es el que se mostrará en los errores
        $fechaMinima = date('d-m-Y', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha'      => ['date', 'after:' . $fechaMinima, 'before:' . $fechaLimite], //fecha minima hoy, fecha máxima dentro de un mes
            'residentes' => ['required'],
        ]);
        //creación de grupo;
        $grupo              = new Grupo();
        $grupo->empleado_id = $request->empleado_id;
        $grupo->fecha       = $request->fecha;
        $grupo->hora        = $request->hora;
        $grupo->descripcion = $request->descripcion;

        $grupo->save();

        //creacion de la relacion en la tabla pivote;
        $residentesSeleccionados = $request->residentes;

        foreach($residentesSeleccionados as $residente) {
            $grupo_residente = new Residente_Grupo();

            $grupo_residente->residente_id = $residente; //usamos el id de cada residente enviado en el formulario
            $grupo_residente->grupo_id     = $grupo->id; //usamos el id del grupo recien creado.
            $grupo_residente->save();
        }

        return redirect()->route('lista.grupos')->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de mostrar todos los grupos.
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $usuario = auth()->user(); //para validadar que es el creador del grupo

        $residentes = Residente::where('estado', 'alta')->get();
        $grupo      = Grupo::find($id);
        if (!$grupo) { //si no existe el grupo volver atrás
            return redirect()->back();
        }

        if($usuario->id != $grupo->empleado->user->id) {
            abort(403, 'No tienes autorización'); //mostrar vista de pagina no atorizada

        }

        return view('terapeuta.formGrupos', ['residentes' => $residentes, 'grupo' => $grupo]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $fechaLimite = date('d-m-Y', strtotime('+1 month +1 day')); //este formato es el que se mostrará en los errores
        $fechaMinima = date('d-m-Y', strtotime('-1 day'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'fecha'      => ['date', 'after:' . $fechaMinima, 'before:' . $fechaLimite], //fecha minima hoy, fecha máxima dentro de un mes
            'residentes' => ['required'],
        ]);

        //creación de grupo;
        $grupo              = Grupo::find($id);
        $grupo->fecha       = $request->fecha;
        $grupo->hora        = $request->hora;
        $grupo->descripcion = $request->descripcion;
        $grupo->save();

        //creacion de la relacion en la tabla pivote;
        $residentesSeleccionados = $request->residentes;

        $grupo->residentes()->detach(); // borra las relaciones con los residentes

        // Agregar las nuevas relaciones con los residentes seleccionados en el formulario
        $residentesSeleccionados = $request->residentes;
        foreach ($residentesSeleccionados as $residenteId) {
            $grupo->residentes()->attach($residenteId); ///APUNTES LARAVEL CLASE
        }

        return redirect()->route('lista.grupos')->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de mostrar todos los grupos.

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $grupo = Grupo::find($id);
        if (!$grupo) { //si no existe el residente volver atrás
            return redirect()->back();
        }
        $grupo->delete();

        $grupos = Grupo::orderByDesc('fecha')->get();

        //no hay que borrar manual mente las relaciones de la tabla residentes_grupos por que tiene delete on cascade

        return redirect()->route('lista.grupos')->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //no enviamos vistas para evitar el reenvio del formulario. Ruta de mostrar todos los grupos.
    }

    public function destroyPivot(string $id, string $residente_id)
    {

        //borar las relaciones
        DB::table('residentes_grupos')->where('grupo_id', $id)->where('residente_id', $residente_id)->delete(); // lo hacemos por sql->> seguir probando detach

        $residente = Residente::find($residente_id);
        $grupos    = $residente->grupos->sortByDesc('fecha'); //ordenar las colleciones con eloquent
        //no hay que borrar manual mente las relaciones de la tabla residentes_grupos por que tiene delete on cascade

        return view('terapeuta.residenteGrupos', ['grupos' => $grupos, 'residente' => $residente]); //envialos a la vista el residente y sus grupos
    }
}
