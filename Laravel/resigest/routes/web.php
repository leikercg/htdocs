<?php

use App\Http\Controllers\CuraController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\VisitaController;
use App\Models\Residente;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); //inicio de laravel, hacemos que la pagina raiz deveulva la bista login
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



//////////////////////////////// Rutas de medicos///////////////////////////////
Route::get('residente/visitas/{residente_id}', [VisitaController::class, 'show'])->name('visitas.residente');
Route::get('residente/visitas/{id}/{residente_id}', [VisitaController::class, 'edit'])->name('editar.visita'); //lanzar formulario de edición
Route::put('residente/visita/{id}', [VisitaController::class, 'update'])->name('actualizar.visita'); //actualizar visita
Route::get('visita/{residente_id}', [VisitaController::class, 'create'])->name('crear.visita'); //formulario de creación de vistas
Route::post('visita/{id?}', [VisitaController::class, 'store'])->name('almacenar.visita');//crea la visita
Route::delete('visita/{id}', [VisitaController::class, 'destroy'])->name('borrar.visita');//borrar visita

Route::get('residente/sesion/{residente_id}', [SesionController::class, 'show'])->name('sesiones.residente');
Route::get('residente/sesion/{id}/{residente_id}', [SesionController::class, 'edit'])->name('editar.sesion'); //lanzar formulario de edición
Route::put('residente/sesion/{id}', [SesionController::class, 'update'])->name('actualizar.sesion'); //actualizar sesion
Route::get('sesion/{residente_id}', [SesionController::class, 'create'])->name('crear.sesion'); //formulario de creación de vistas
Route::post('sesion/{id?}', [SesionController::class, 'store'])->name('almacenar.sesion');//crea la sesion
Route::delete('sesion/{id}', [SesionController::class, 'destroy'])->name('borrar.sesion');//borrar sesion



Route::get('residente/cura/{residente_id}', [CuraController::class, 'show'])->name('curas.residente');
Route::get('residente/cura/{id}/{residente_id}', [CuraController::class, 'edit'])->name('editar.cura'); //lanzar formulario de edición
Route::put('residente/cura/{id}', [CuraController::class, 'update'])->name('actualizar.cura'); //actualizar cura
Route::get('cura/{residente_id}', [CuraController::class, 'create'])->name('crear.cura'); //formulario de creación de curas
Route::post('cura/{id?}', [CuraController::class, 'store'])->name('almacenar.cura');//crea la cura
Route::delete('cura/{id}', [CuraController::class, 'destroy'])->name('borrar.cura');//borrar cura



/////////////RUTAS DE ADMINISTRACIÓN///////////////////////////////////////

//////////////////////////////////// Rutas para gerentes/////////////////////////////////////

//////////////////////////////// Rutas de seguimientos///////////////////////////////
Route::get('segumiento_residente/{id}/{departamento_id}', [SeguimientoController::class, 'show'])->name('seguimiento.residente'); ///seguimiento de residente

require __DIR__ . '/auth.php';
