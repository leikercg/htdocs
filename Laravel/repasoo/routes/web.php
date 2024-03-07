<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('index');})->name('menu');

Route::get('product', 'ProductController@index')->name('product.index');
Route::get('product/id={product?}', 'ProductController@show')->name('product.show');
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product/{product?}', 'ProductController@store')->name('product.store');
Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('product/{product}', 'ProductController@update')->name('product.update');
Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');

Route::get('supplier/products', 'SupplierController@products')->name('supplier.products');

Route::resource('supplier', 'SupplierController');
Route::resource('contact', 'ContactController');

/* EMPLOYEE */


Route::get('employee',[EmployeeController::class,'index'])->name('mostrarEmpleados');
Route::get('employee/id={employee?}',[EmployeeController::class,'show'])->name('mostrarEmpleado');
Route::get('employee/create',[EmployeeController::class,'create'])->name('crearEmpleado');
Route::delete('employee/{employee}', [EmployeeController::class,'destroy'])->name('borrarEmpleado');
Route::post('employee/{employee?}', [EmployeeController::class,'store'])->name('almacenarEmpleado');
Route::get('employee/{employee}/edit', [EmployeeController::class,'edit'])->name('editarEmpleado');
Route::patch('employee/{employee}', [EmployeeController::class,'update'])->name('actualizarEmpleado');




/*order*/

Route::get('order/create',[OrderController::class,'create'])->name('crearPedido');
Route::post('order/mostrar',[OrderController::class,'mostrar'])->name('mostrarPedido');











/*
Route::get('product/id={product?}', 'ProductController@show')->name('product.show');
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product/{product?}', 'ProductController@store')->name('product.store');
Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('product/{product}', 'ProductController@update')->name('product.update');
Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');*/


?>
