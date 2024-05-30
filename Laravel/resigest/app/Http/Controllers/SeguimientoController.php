<?php

namespace App\Http\Controllers;

use App\Models\Residente;
use Illuminate\Http\Request;
use App\Models\Seguimiento;
use App\Models\User;
use DateTime; //exportar clase Date

class SeguimientoController extends Controller
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
    public function show(string $Id_residente, string $Id_departamento) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $Id_residente, string $Id_departamento) // Método para lanzar el formulario de edición de un seguimiento
    {
        //

        $residente = Residente::find($Id_residente); //encontramos el residente en caso no existir ese departamento o residente volver atrás
        if (!$residente || !in_array($Id_departamento, [1, 2, 3, 4, 5])) {
            return redirect()->back();
        }



        $esFamiliar = true; //creamos una variable booleana

        if(auth()->user()->departamento_id == 6) {//si el usuario es un familiar

            $usuario  = User::find(auth()->user()->id);
            $familiar = $usuario->familiar; //encontramos al familiar

            $familiares = $familiar->residentes; //obtenemos los familiares internos del familiar

            if($familiares->contains($residente)) {//si el residente indicado en la ruta esta en lista de familiares la variable es true
                $esFamiliar = true;
            } else {
                $esFamiliar = false; //si no es familiar es falso
            }

        }

        $seguimientos = $residente->seguimientos; //segumientos del residente
        $seguimiento  = null; //solo para pruebas seeder, BORRAAAAAR

        foreach($seguimientos as $seguimientoLista) {
            if($seguimientoLista->departamento->id == $Id_departamento) {//si departamento del segumientoes igual al departamento__id enviado guardar este segumiento
                $seguimiento = $seguimientoLista;
            }
        }

        if($esFamiliar == false) {//si no es familiar no puede ver el segumiento
            abort(403, 'No tienes autorización para ver este seguimiento');
        }
        //en caso contrario será empleado o familiar, es indiferente ya que ambospueden ver el seguimiento, pero el familiar no puede modificar nada

        return view('seguimiento.seguimiento', ['seguimiento' => $seguimiento, 'residente' => $residente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //Actualizar seguimiento
    {
        //
        date_default_timezone_set('Europe/Madrid'); // por que no me detectaba bien la zona horaria del servidor
        $nombre=auth()->user()->empleado->nombre ." ". auth()->user()->empleado->apellidos;
        $fechaActual = (new DateTime())->format('d-m-Y H:i'); //optenemos la fecha de hoy con formato

        $seguimiento = Seguimiento::find($id); //obtenemos el segumiento

        $texto = $request->seguimiento; //obtenemos la cadena de texto del formulario

        $anadirSegumiento = $seguimiento->seguimiento . "\n" . $fechaActual.": ". $nombre . "\n" . $texto . "\n \n"; //concatenemos el antigua seguimiento con la fecha y el texto del formulario

        $seguimiento->seguimiento = $anadirSegumiento; //lo establecemos como nuevo segumiento
        $seguimiento->save();

        return redirect()->route('editar.seguimiento', ['id' => $seguimiento->residente_id, 'departamento_id' => $seguimiento->departamento_id]); //volvemos a al formulario
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
