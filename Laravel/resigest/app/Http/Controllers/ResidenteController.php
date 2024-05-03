<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residente;
use App\Models\Seguimiento;
use App\Models\Departamento;
use App\Models\Familiar;
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
        if (auth()->check() && auth()->user()->departamento_id == 6) {//comprobar si hay un usuario autenticado y si es del departamento  6 (familiar) usar esta ruta:
            return redirect()->route('lista.residentesFamiliar'); //nos lleva a la ruta de lista de residentes familiares
        }
        return view('empleado.general', ['residentes' => $residentes]); //array clave--> valor
        //en las vistas se reciben las variables ya extraidas, no hay que indexarlars.

    }

    public function indexFamiliar()
    {
        //
        $familiar   = Familiar::find(auth()->user()->familiar->id); //encontrar el id del familiar que esta siendo usuario.
        $residentes = $familiar->residentes->sortBy('apellidos');
        //ordenar por apellido y nombre y filtro de estado
        // Calcular la edad para cada residente
        foreach ($residentes as $residente) {

            $fechaNacimiento = new DateTime($residente->fecha_nac); //Fecha de nacimiento

            $fechaActual = new DateTime(); //Fecha de actual

            $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

            $residente->edad = $edad; //Agregar atributo edad a los datos de la vista
        }
        if(auth()->check() && auth()->user()->departamento_id == 6) {//comprobar si hay un usuario autenticado y si es del departamento  6 (familiar) usar esta vista:
            return view('familiar.general', ['residentes' => $residentes]);
        }

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
    public function create() //validado por el middleware del departamento
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
        /////////////validar datos/////////

        $fechaMinima = date('d-m-Y', strtotime('1900-01-01'));
        $fechaLimite = date('d-m-Y', strtotime('2020-01-01'));

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'dni'       => ['required', 'string', 'size:9', 'unique:' . Residente::class], //verificar que no exita ese dni en la tabla de users
            'fecha_nac' => ['date', 'after:' . $fechaMinima , 'before:'. $fechaLimite],
        ]);
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

        $residentes = Residente::all()->where('estado', 'alta');
        foreach ($residentes as $residente) {

            $fechaNacimiento = new DateTime($residente->fecha_nac); //Fecha de nacimiento

            $fechaActual = new DateTime(); //Fecha de actual

            $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

            $residente->edad = $edad; //Agregar atributo edad a los datos de la vista

        }

        return redirect()->route('lista.residentes')->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito; //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.
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

        $residentes = $todosResidentes->where('estado', 'alta');

        foreach ($residentes as $residente) {

            $fechaNacimiento = new DateTime($residente->fecha_nac); //Fecha de nacimiento

            $fechaActual = new DateTime(); //Fecha de actual

            $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

            $residente->edad = $edad; //Agregar atributo edad a los datos de la vista
        }
        if(auth()->check() && auth()->user()->departamento_id == 7) {//comprobar si hay un usuario autenticado y si es del departamento 7 (gerencia) usar esta ruta:
            return view('gerente.gestionarResidentes', ['residentes' => $residentes]); //enviar a la vista de bajas con filtro
        }
        return view('empleado.general', ['residentes' => $residentes]); //si no es gerente ira a esta vista
    }

    public function buscarBajas(Request $request)
    {
        $todosResidentes = Residente::where('nombre', 'like', "%$request->busqueda%")->orWhere('apellidos', 'like', "%$request->busqueda%")->orderBy('apellidos')->orderBy('nombre')->get(); //buscar coincidencia con ek nombre ó apellido

        $residentes = $todosResidentes->where('estado', 'baja');

        foreach ($residentes as $residente) {

            $fechaNacimiento = new DateTime($residente->fecha_nac); //Fecha de nacimiento

            $fechaActual = new DateTime(); //Fecha de actual

            $edad = $fechaActual->diff($fechaNacimiento)->y; //edad en años ->Y

            $residente->edad = $edad; //Agregar atributo edad a los datos de la vista
        }

        return view('gerente.bajas', ['residentes' => $residentes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $residente = Residente::find($id);

        ////////REVISAR validado ya en middleware////
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

        return redirect()->route('lista.residentes')->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito; //no enviamos vistas para evitar el reenvio del formulario. Ruta de curas del residente.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)//NO USADA
    {
        $residente = Residente::find($id);
        $residente->delete();
        return redirect()->route('lista.residentes')->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito; ////revisar
    }

    public function itinerario(Request $request, $Id_residente)
    {
        $fecha       = $request->input('fecha', now()->toDateString()); // Si no se especifica la fecha, se establece como la fecha de hoy
        $residente   = Residente::find($Id_residente);
        $actividades = collect([]); // Una colección de Laravel para almacenar las relaciones

        $sesiones = $residente->sesiones->where('fecha', $fecha); //comparar fechas
        $curas    = $residente->curas->where('fecha', $fecha);
        $visitas  = $residente->visitas->where('fecha', $fecha);
        $tareas   = $residente->tareas->where('fecha', $fecha);
        $grupos   = $residente->grupos->where('fecha', $fecha);

        $actividades = $actividades->concat($sesiones)->concat($curas)->concat($visitas)->concat($tareas)->concat($grupos); //juntarlo en una colección

        $actividades = $actividades->sortBy(function ($actividad) { //ordenarlos
            return $actividad->fecha . ' ' . $actividad->hora;
        });

        return view('residente.itinerario', ['residente' => $residente, 'programacion' => $actividades, 'fecha' => $fecha]);
    }

}
