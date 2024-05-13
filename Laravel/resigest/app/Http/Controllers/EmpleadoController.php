<?php

namespace App\Http\Controllers;

use App\Models\Empleado;

use Dompdf\Dompdf;

use Dompdf\Options;


use Illuminate\Http\Request;

class EmpleadoController extends Controller
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
    public function create() //enviar a formulario de creacion o modificación de empleado
    {//
        return view('gerente.formEmpleado');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function buscar(Request $request) // Método para buscar empleados
    {
        $empleados = Empleado::where('nombre', 'like', "%$request->busqueda%")->orWhere('apellidos', 'like', "%$request->busqueda%")->orderBy('estado')->orderBy('apellidos')->orderBy('nombre')->get(); //buscar coincidencia con el nombre ó apellido

        return view('gerente.familiar_empleado', ['empleados' => $empleados]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)//enviar a formulario de creacion o modificación de empleado con el empleado indicado
    {
        $empleado = Empleado::find($id);
        return view('gerente.formEmpleado', ['empleado' => $empleado]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //método para actualizar la base de datos
    {
        //
        $empleado = Empleado::find($id);

        $empleado->telefono  = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->estado    = $request->estado;

        $empleado->save();

        return redirect()->route('familiar_empleado')->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito //usamos rutas para no reeenviar formularios al recargar
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) // Método para actualizar la base de datos
    {
        //
    }
    public function itinerario(Request $request) // Método para ver el itinerario del EMPLEADO
    {
        // Si es un usuario admin, familiar o auxiliar volver atrás (No tienen esta función)
        if(auth()->user()->departamento_id == 5 || auth()->user()->departamento_id == 7 || auth()->user()->departamento_id == 6) {
            return redirect()->back();
        }

        $fecha       = $request->input('fecha', now()->toDateString()); // Si no se especifica la fecha, se establece como la fecha de hoy
        $empleado    = Empleado::find(auth()->user()->empleado->id);
        $actividades = collect([]); // Una colección de Laravel para almacenar las relaciones

        // Cogemos cada actividad dependiendo del tipo de usuario
        if($empleado->departamento->id == 1) {
            $visitas     = $empleado->visitas->where('fecha', $fecha);
            $actividades = $actividades->concat($visitas);
        } elseif($empleado->departamento->id == 2) {
            $tareas      = $empleado->tareas->where('fecha', $fecha);
            $curas       = $empleado->curas->where('fecha', $fecha);
            $actividades = $actividades->concat($curas)->concat($tareas);
        } elseif($empleado->departamento->id == 3) {
            $sesiones    = $empleado->sesiones->where('fecha', $fecha);
            $actividades = $actividades->concat($sesiones);
        } elseif($empleado->departamento->id == 4) {
            $grupos      = $empleado->grupos->where('fecha', $fecha);
            $actividades = $actividades->concat($grupos);
        }

        $actividades = $actividades->sortBy(function ($actividad) { //ordenarlos por fecha y hora
            return $actividad->fecha . ' ' . $actividad->hora;
        });

        return view('empleado.itinerario', ['empleado' => $empleado, 'programacion' => $actividades, 'fecha' => $fecha]); // Devolvemos la vista con todos los datos necesarios
    }

    public function imprimirAgenda($date) // Método para generr pdf y/o imprimir el pdf (es igual que mostrar el itinerario solo que instancion un objeto dompdf)
    {
        // Si es un usuario admin, familiar o auxiliar volver atrás (No tienen esta función)
        if(auth()->user()->departamento_id == 5 || auth()->user()->departamento_id == 7 || auth()->user()->departamento_id == 6) {
            return redirect()->back();
        }

        $fecha       = $date;
        $empleado    = Empleado::find(auth()->user()->empleado->id);
        $actividades = collect([]); // Una colección de Laravel para almacenar las relaciones

        if($empleado->departamento->id == 1) {
            $visitas     = $empleado->visitas->where('fecha', $fecha);
            $actividades = $actividades->concat($visitas);
        } elseif($empleado->departamento->id == 2) {
            $tareas      = $empleado->tareas->where('fecha', $fecha);
            $curas       = $empleado->curas->where('fecha', $fecha);
            $actividades = $actividades->concat($curas)->concat($tareas);
        } elseif($empleado->departamento->id == 3) {
            $sesiones    = $empleado->sesiones->where('fecha', $fecha);
            $actividades = $actividades->concat($sesiones);
        } elseif($empleado->departamento->id == 4) {
            $grupos      = $empleado->grupos->where('fecha', $fecha);
            $actividades = $actividades->concat($grupos);
        }

        $actividades = $actividades->sortBy(function ($actividad) { //ordenarlos por fecha y hora
            return $actividad->fecha . ' ' . $actividad->hora;
        });
        $html = view('imprimir.impresiones', ['empleado' => $empleado, 'programacion' => $actividades, 'fecha' => $fecha]);


        /* Establecer opciones, para mostyrar imágnes*/

        $options= new Options();
        $options->set('isRemoteEnabled',true);

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
        return $dompdf->stream('agenda.pdf', ['Attachment' => false]); //con true se descargaria automáticamente
    }

}
