<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function show()
    {
        $empleados = Employee::all();
        return view('employee.employees', ["empleados" => $empleados]); //array clave--> valor
        //en las vistas se reciben las variables ya extraidas, no hay que indexarlars.
    }
    public function edit($id)
    {
        $e = Employee::find($id);

        return view('employee.form', array('empleado' => $e));
    }
   /* public function edit($id) {
        $product = Product::find($id);
        $suppliers = Supplier::all();
        return view('product.form', array('product' => $product, 'suppliers' => $suppliers));
    }*/

    public function delete($id)
    {
        $e = Employee::find($id);
        $e->delete();
        return redirect()->route('mostrarEmpleados');
    }


}
