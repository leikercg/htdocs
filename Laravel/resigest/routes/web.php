<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\SeguimientoController;
use App\Models\Residente;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login'); //inicio de laravel, hacemos que la pagina raiz deveulva la bista login
})->name('inicio');

Route::get('/dashboard', function () {//ruta al dashboarda
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {//rutas accesibles solo si estas autenticado el usuriao, editar actualizar y borrar perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('product', 'ProductController@index')->name('product.index');
Route::get('product/id={product?}', 'ProductController@show')->name('product.show'); ///////////////////////////////////////////////////////////
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product/{product?}', 'ProductController@store')->name('product.store');
Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('product/{product}', 'ProductController@update')->name('product.update');
Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');

//////////////////////////////// Rutas de Residentes///////////////////////////////
Route::get('lista_residentes', [ResidenteController::class, 'index'])->name('lista.residentes'); ///lista de residentes
Route::get('lista_residentes_completa', [ResidenteController::class, 'indexBajas'])->name('lista.completa.residentes'); ///lista de residentes con bajas incluidas
Route::get('ficha_residente/{id}', [ResidenteController::class, 'show'])->name('ficha.residente'); ///ficha de residente
Route::get('itinerario/{id}', [ResidenteController::class, 'itinerario'])->name('itinerario.residente'); ///itinerario de residente

Route::get('residente/crear', [ResidenteController::class, 'create'])->name('crear.residente'); //formulario de creación de residente
Route::post('residente/{id?}', [ResidenteController::class, 'store'])->name('almacenar.residente'); //almacenar residente
Route::get('residente/{id}', [ResidenteController::class, 'edit'])->name('editar.residente'); //lanzar formulario de edición
Route::put('residente/{id}', [ResidenteController::class, 'update'])->name('actualizar.residente'); //actualizar residente

Route::get('lista_residentes/busqueda', [ResidenteController::class, 'buscar'])->name('buscar.residente'); ///ficha de residente por filtro de búsquda

Route::get('empleado/busqueda', [EmpleadoController::class, 'buscar'])->name('buscar.empleado'); /// empleado por filtro de búsquda
Route::get('familiar/busqueda', [FamiliarController::class, 'buscar'])->name('buscar.familiar'); ///familiar por filtro de búsquda





/////////////RUTAS DE ADMINISTRACIÓN///////////////////////////////////////


//////////////////////////////////// Rutas para gerentes/////////////////////////////////////

Route::get('lista_residentes', [ResidenteController::class, 'index'])->name('lista.residentes'); ///lista de residentes

//////////////////////////////// Rutas de seguimientos///////////////////////////////
Route::get('segumiento_residente/{id}/{departamento_id}', [SeguimientoController::class, 'show'])->name('seguimiento.residente'); ///seguimiento de residente

require __DIR__ . '/auth.php';
