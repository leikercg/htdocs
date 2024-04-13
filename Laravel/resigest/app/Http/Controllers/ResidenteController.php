<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residente;
use App\Models\Seguimiento;
use App\Models\Departamento;
use DateTime; //exportar clase Date

class ResidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $residentes = Residente::where('estado', 'alta')->orderBy('apellidos')->orderBy('nombre')->get();
        //ordenar por apellido y nombre y filtro de estado
        // Calcular la edad para cada residente
        foreach ($residentes as $residente) {

            $fechaNacimiento = new DateTime($residente->fecha_nac); //Fecha de nacimiento

            $fechaActual = new DateTime(); //Fecha de actual

            $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

            $residente->edad = $edad; //Agregar atributo edad a los datos de la vista
        }
        if(auth()->check() && auth()->user()->departamento_id == 7) {//comprobar si hay un usuario autenticado y si es del departamento 7 (gerencia) usar esta ruta:
            return view('gerente.gestionarResidentes', ['residentes' => $residentes]);
        }
        return view('empleado.general', ['residentes' => $residentes]); //array clave--> valor
        //en las vistas se reciben las variables ya extraidas, no hay que indexarlars.

    }

    public function indexBajas()
    {
        //
        $residentes = Residente::where('estado', 'baja')->orderBy('apellidos')->orderBy('nombre')->get(); //ordenar por apellido y nombre
        // Calcular la edad para cada residente
        foreach ($residentes as $residente) {

            $fechaNacimiento = new DateTime($residente->fecha_nac); //Fecha de nacimiento

            $fechaActual = new DateTime(); //Fecha de actual

            $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

            $residente->edad = $edad; //Agregar atributo edad a los datos de la vista
        }
        if(auth()->check() && auth()->user()->departamento_id == 7) {//comprobar si hay un usuario autenticado y si es del departamento 7 (gerencia) usar esta ruta:
            return view('gerente.bajas', ['residentes' => $residentes]);
        }
        return view('empleado.general', ['residentes' => $residentes]); //array clave--> valor
        //en las vistas se reciben las variables ya extraidas, no hay que indexarlars.

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->check() && auth()->user()->departamento_id == 7) {//comprobar si hay un usuario autenticado y si es del departamento 7 (gerencia) usar esta ruta:
            return view('gerente.formResidente'); //enviar al formulario de creación/modificación de residente
        }
        return redirect()->route('lista.residentes'); //si no es admin vera la lista de residentes, no podra editar ni crear

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /////////////////crea el residente////////////////////////
        $residente             = new Residente();
        $residente->nombre     = $request->nombre;
        $residente->dni        = $request->dni;
        $residente->apellidos  = $request->apellidos;
        $residente->habitacion = $request->habitacion;
        $residente->fecha_nac  = $request->fecha;
        $residente->estado     = $request->estado;
        $residente->fecha_nac  = $request->fecha_nac;

        $residente->save();
        /////////////crea el seguimiento de cada area para el residente creado//////////

        for ($i = 1; $i <= 5; $i++) {
            $departamento = Departamento::find($i);
            if ($departamento) {
                $seguimiento                  = new Seguimiento();
                $seguimiento->residente_id    = $residente->id;
                $seguimiento->departamento_id = $i;
                $seguimiento->seguimiento     = "Seguimiento del departamento de " . $departamento->nombre . " para " . $residente->nombre . " " . $residente->apellidos;
                $seguimiento->save();
            }
        }

        //////////devuelve la lista de residentes para la vista///////////////////

        $residentes = Residente::all();
        foreach ($residentes as $residente) {

            $fechaNacimiento = new DateTime($residente->fecha_nac); //Fecha de nacimiento

            $fechaActual = new DateTime(); //Fecha de actual

            $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

            $residente->edad = $edad; //Agregar atributo edad a los datos de la vista

        }
        return view('gerente.gestionarResidentes', ['residentes' => $residentes]); //enviar al formulario de creación/modificación de residente
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

        $fechaNacimiento = new DateTime($residente->fecha_nac); //Fecha de nacimiento

        $fechaActual = new DateTime(); //Fecha de actual

        $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

        $residente->edad = $edad; //Agregar atributo edad a losdatos de la vista

        // Puedes pasar los familiares a la vista como datos
        return view('empleado.ficha_residente', ['residente' => $residente, 'familiares' => $familiares]);
    }

    public function buscar(Request $request)
    {
        $todosResidentes = Residente::where('nombre', 'like', "%$request->busqueda%")->orWhere('apellidos', 'like', "%$request->busqueda%")->orderBy('apellidos')->orderBy('nombre')->get(); //buscar coincidencia con ek nombre ó apellido

        $residentes= $todosResidentes->where('estado', 'alta');

        foreach ($residentes as $residente) {

            $fechaNacimiento = new DateTime($residente->fecha_nac); //Fecha de nacimiento

            $fechaActual = new DateTime(); //Fecha de actual

            $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

            $residente->edad = $edad; //Agregar atributo edad a los datos de la vista
        }

        return view('empleado.general', ['residentes' => $residentes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $residente = Residente::find($id);

        if(auth()->check() && auth()->user()->departamento_id == 7) {//comprobar si hay un usuario autenticado y si es del departamento 7 (gerencia) usar esta ruta:
            return view('gerente.formResidente', ['residente' => $residente]); //enviar al formulario de creación/modificación de residente
        }
        return redirect()->route('empleado.general'); //si no es admin vera la lista de residentes, no podra editar ni crear

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $residente             = Residente::find($id);
        $residente->nombre     = $request->nombre;
        $residente->dni        = $request->dni;
        $residente->apellidos  = $request->apellidos;
        $residente->habitacion = $request->habitacion;
        $residente->fecha_nac  = $request->fecha;
        $residente->estado     = $request->estado;
        $residente->fecha_nac  = $request->fecha_nac;
        $residente->save();

        return redirect()->route('lista.residentes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $residente = Residente::find($id);
        $residente->delete();
        return redirect()->route('lista.residentes'); ////revisar
    }

    public function itinerario(Request $request, $Id_residente)
    {
        $fecha       = $request->input('fecha', now()->toDateString()); // Si no se especifica la fecha, se establece como la fecha de hoy
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
