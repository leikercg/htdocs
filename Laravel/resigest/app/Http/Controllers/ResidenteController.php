<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residente;

use DateTime; //exportar clase Date

class ResidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $residentes = Residente::all();

        // Calcular la edad para cada residente
        foreach ($residentes as $residente) {

            $fechaNacimiento = new DateTime($residente->Fecha_Nac); //Fecha de nacimiento

            $fechaActual = new DateTime(); //Fecha de actual

            $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

            $residente->edad = $edad; //Agregar atributo edad a losdatos de la vista
        }
        return view('empleado.general', ['residentes' => $residentes]); //array clave--> valor
        //en las vistas se reciben las variables ya extraidas, no hay que indexarlars.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $residente = Residente::find($id);

        /* if (!$residente) {
             // Manejar el caso en el que el residente no se encuentre
             return redirect()->route('pagina_de_error');
         }*/

        // Obtener los familiares del residente

        $familiares = $residente->familiares;

        $fechaNacimiento = new DateTime($residente->Fecha_Nac); //Fecha de nacimiento

        $fechaActual = new DateTime(); //Fecha de actual

        $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

        $residente->edad = $edad; //Agregar atributo edad a losdatos de la vista

        // Puedes pasar los familiares a la vista como datos
        return view('empleado.ficha_residente', ['residente' => $residente, 'familiares' => $familiares]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function itinerario(Request $request, $Id_residente)
    {
        $fecha = $request->input('fecha', now()->toDateString()); // Si no se especifica la fecha, se establece como la fecha de hoy
        $residente   = Residente::find($Id_residente);
        $actividades = collect([]); // Una colección de Laravel para almacenar las relaciones

        $sesiones = $residente->sesiones->where('Fecha', $fecha)->sortBy('Hora'); //comparar fechas
        $curas    = $residente->curas->where('Fecha', $fecha)->sortBy('Hora');
        $visitas  = $residente->visitas->where('Fecha', $fecha)->sortBy('Hora');

        $actividades = $actividades->concat($sesiones)->concat($curas)->concat($visitas); //juntarlo en una colección

        $actividades = $actividades->sortBy(function ($actividad) { //ordenarlos
            return $actividad->Fecha . ' ' . $actividad->Hora;
        });

        return view('residente.itinerario', ['residente' => $residente, 'programacion' => $actividades, 'fecha' => $fecha]);
    }

}
