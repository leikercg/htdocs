<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Familiar;

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

    public function buscar(Request $request)
    {
        $empleados = Empleado::where('nombre', 'like', "%$request->busqueda%")->orWhere('apellidos', 'like', "%$request->busqueda%")->orderBy('apellidos')->orderBy('nombre')->get(); //buscar coincidencia con el nombre ó apellido

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
    public function update(Request $request, string $id)
    {
        //
        $empleado = Empleado::find($id);


        $empleado->telefono  = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->save();

         // Empleado del 1 al 5
         $empleados = Empleado::whereBetween('departamento_id', [1, 5])->get();

         // Obtener los usuarios familiares (departamento_id 6)
         $familiares = Familiar::where('departamento_id', 6)->get();

         return view('gerente.familiar_empleado', ['empleados' => $empleados, 'familiares' => $familiares]); //enviamos todos los usuario por separado a la vista
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
