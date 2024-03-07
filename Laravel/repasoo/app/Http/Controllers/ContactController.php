<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    public function index() {
        $contactList = Contact::all();
        return view('contact.all', ['contactList'=>$contactList]);
    }

    public function show($id) {
        $p = Contact::find($id);
        $data['contact'] = $p;
        return view('contact.show', $data);
    }

    public function create() {
        $suppliers = Supplier::all();
        $employees = DB::table("employees")->where("department", "=", "Compras")->get();// de esta manera solo pasamos a la vista los empleados del departamento de compras
        return view('contact.form', array('suppliers' => $suppliers,'employees'=>$employees));
    }

    public function store(Request $r) {
        $p = new Contact();
        $p->name = $r->name;
        $p->surname = $r->surname;
        $p->email = $r->email;
        $p->phone_number = $r->phone_number;
        $p->supplier_id = $r->supplier_id;
        $p->employee_id=$r->employee_id;//debemos añadir esto ya qye vamos a ingrear un nuevo campo desde el formulario.
        $p->save();
        return redirect()->route('contact.index');
    }

    public function edit($id) {
        $contact = Contact::find($id);
        $suppliers = Supplier::all();
        $employees = DB::table("employees")->where("department", "=", "Compras")->get();// de esta manera solo pasamos a la vista los empleados del departamento de compras
        return view('contact.form', array('contact' => $contact, 'suppliers' => $suppliers,'employees'=>$employees));
    }

    public function update($id, Request $r) {
        $p = Contact::find($id);
        $p->name = $r->name;
        $p->surname = $r->surname;
        $p->email = $r->email;
        $p->phone_number = $r->phone_number;
        $p->supplier_id = $r->supplier_id;
        $p->employee_id=$r->employee_id;//debemos añadir esto ya qye vamos a ingrear un nuevo campo desde el formulario.
        $p->save();
        return redirect()->route('contact.index');
    }

    public function destroy($id) {
        $p = Contact::find($id);
        $p->delete();
        return redirect()->route('contact.index');
    }
}
?>
