<?php

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
Route::get('order/form', 'OrderController@showForm')->name('order.form');
Route::get('order/resume', 'OrderController@showResume')->name('order.resume');

Route::resource('supplier', 'SupplierController');
Route::resource('contact', 'ContactController');
Route::resource('employee', 'EmployeeController');





Route::get('order',[OrderController::class,'index'])->name('mostrarOrders');
Route::delete('order/{order}', [OrderController::class,'destroy'])->name('borrarOrder');
Route::get('order/{order}/edit', [OrderController::class,'edit'])->name('editarOrder');
Route::patch('order/{order}', [OrderController::class,'update'])->name('actualizarOrder');
Route::post('order/{order?}',[OrderController::class,'store'])->name('almacenarOrder');

Route::get('order/create', [OrderController::class,'create'])->name('crearOrder');











?>
