<?php

namespace App\Http\Controllers;

use App\Models\Residente;
use Illuminate\Http\Request;
use App\Models\Seguimiento;

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
    public function show(string $Id_residente, string $Id_departamento)
    {
        $residente= Residente::find($Id_residente);
        $seguimiento = Seguimiento::where('Id_residente', $Id_residente)
                                    ->where('Id_departamento', $Id_departamento)
                                    ->first();

        return view('seguimiento.seguimiento', ['seguimiento' => $seguimiento,'residente'=>$residente]);

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
}
