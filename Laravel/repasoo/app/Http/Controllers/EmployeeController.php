<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Supplier;

class EmployeeController extends Controller
{
    //
    public function index() {
        $employeeList = Employee::all();
        return view('employee.all', ['employeeList'=>$employeeList]); //muestra todos los empleados
    }

    public function show($id) {
        $p = Employee::find($id);
        $data['employee'] = $p;
        $s = Employee::find($id)->supplier;
        $data['supplier'] = $s;
        return view('employee.show', $data);//muestra el empleado de la id pasada
    }

    public function create() {
        return view('employee.form'); //muestra el formulario para crear empleado
    }

    public function store(Request $r) {
        $p = new employee();
        $p->name = $r->name;
        $p->surname = $r->surname;
        $p->department = $r->department;
        $p->functions = $r->functions;
        $p->save();
        return redirect()->route('mostrarEmpleados');//porcesa la informacion del formulario para crear un empleado y muestra la vista de todos
    }

    public function edit($id) {
        $employee = Employee::find($id);
        return view('employee.form', ['employee'=>$employee]);//envia al formulario con los datos del empleado
    }

    public function update($id, Request $r) {
        $p = Employee::find($id);
        $p->name = $r->name;
        $p->surname = $r->surname;
        $p->department = $r->department;
        $p->functions = $r->functions;
        $p->save();
        return redirect()->route('mostrarEmpleados');//porcesa la información del formulario y muestra la información de todos los empleados
    }

    public function destroy($id) {
        $p = Employee::find($id);
        $p->delete();
        return redirect()->route('mostrarEmpleados');//elimina el empleado de la id pasada.
    }
}
