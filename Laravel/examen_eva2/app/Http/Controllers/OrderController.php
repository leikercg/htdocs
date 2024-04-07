<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showForm(){
        $employees = Employee::all();
        $products = Product::all();
        return view('order.form', ['employees'=>$employees, 'products'=>$products]);
    }

    public function showResume(Request $r){
        $employee = Employee::find($r->employee_id);
        $product = Product::find($r->product);
        $amount = $r->cantidad;
        return view('order.resume', ['employee'=>$employee, 'product'=>$product, 'amount'=>$amount]);
    }

    public function index() {
        $orders = Order::all();
        return view('order.all', ['orderList'=>$orders]);
    }

    public function destroy($id) {
        $p = Order::find($id);
        $p->delete();
        return redirect()->route('mostrarOrders');
    }

    public function edit($id) {
        $order = Order::find($id);
        $products = Product::all();
        $supppliers= Supplier::all();
        $employees= Employee::all();

        return view('order.edit', ['order'=>$order,'products'=>$products,'suppliers'=>$supppliers, 'employees'=>$employees]);
    }

    public function store(Request $r) {
        $e = new Order();
        $e->product_id = $r->product_id;
        $e->supplier_id = $r->supplier_id;
        $e->employee_id = $r->employee_id;
        $e->amount = $r->amount;
        $e->price = $r->price;
        $e->comments = $r->comments;
        $e->save();
        return redirect()->route('mostrarOrders');
    }

    public function create() {
        $products = Product::all();
        $supppliers= Supplier::all();
        $employees= Employee::all();
        return view('order.edit',['products'=>$products,'suppliers'=>$supppliers, 'employees'=>$employees]);
    }

    public function update($id, Request $r) {
        $e = Order::find($id);
        $e->product_id = $r->product_id;
        $e->supplier_id = $r->supplier_id;
        $e->employee_id = $r->employee_id;
        $e->amount = $r->amount;
        $e->price = $r->price;
        $e->comments = $r->comments;
        $e->save();
        return redirect()->route('mostrarOrders');
    }
}
