<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use App\Models\Empleado;
use App\Models\Familiar_Residente_;

use Illuminate\Http\Request;
use App\Models\Residente;

class FamiliarController extends Controller
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

        $residentes = Residente::all();

        return view('gerente.formFamiliar', ['residentes' => $residentes]); //enviamos todos los residentes para que pueda elegir al correspondiente
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
        $familiares = Familiar::where('nombre', 'like', "%$request->busqueda%")->orWhere('apellidos', 'like', "%$request->busqueda%")->orderBy('apellidos')->orderBy('nombre')->get(); //buscar coincidencia con el nombre ó apellido

        return view('gerente.familiar_empleado', ['familiares' => $familiares]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)//enviar a formulario de creacion o modificación de empleado con el empleado indicado
    {
        $familiar = Familiar::find($id);

        $residentes = Residente::whereDoesntHave('familiares', function ($query) use ($id) { //familiares sin relacion con el familiar ordenador por nombre y apellido
            $query->where('familiar_id', $id);
        })->orderBy('nombre')->orderBy('apellidos')->get();

        return view('gerente.formFamiliar', ['familiar' => $familiar, 'residentes' => $residentes]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $familiar = Familiar::find($id);

        $familiar->telefono  = $request->telefono;
        $familiar->direccion = $request->direccion;
        $familiar->save(); //actualizar familiar

        if($request->residente != null) { //si se agrega un nuevo familiar crear la relación en la tabla, es decir si se ingresa null no hcaer esto
            //en caso de agregar familiar hacer esto
            $familiar_residente               = new Familiar_Residente_();
            $familiar_residente->familiar_id  = $familiar->id;
            $familiar_residente->residente_id = $request->residente;

            $familiar_residente->save();
        }

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
        $familiar = Familiar::find($id);
        $familiar->delete();

        // Empleado del 1 al 5
        $empleados = Empleado::whereBetween('departamento_id', [1, 5])->get();

        // Obtener los usuarios familiares (departamento_id 6)
        $familiares = Familiar::where('departamento_id', 6)->get();

        return view('gerente.familiar_empleado', ['empleados' => $empleados, 'familiares' => $familiares]); //enviamos todos los usuario por separado a la vista
    }

}
