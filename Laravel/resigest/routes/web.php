<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\SeguimientoController;
use App\Models\Residente;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); //inicio de laravel
});

Route::get('/dashboard', function () {//ruta al dashboarda
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {//rutas accesibles solo si estas autenticado el usuriao, editar actualizar y borrar perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




//////////////////////////////// Rutas de Residentes///////////////////////////////
Route::get('lista_residentes',[ResidenteController::class,'index'])->name('lista.residentes'); ///lista de residentes
Route::get('ficha_residente/{id}',[ResidenteController::class,'show'])->name('ficha.residente'); ///ficha de residente
Route::get('itinerario/{id}',[ResidenteController::class,'itinerario'])->name('itinerario.residente'); ///itinerario de residente





//////////////////////////////// Rutas de seguimientos///////////////////////////////
Route::get('segumiento_residente/{id}/{id_departamento}',[SeguimientoController::class,'show'])->name('seguimiento.residente'); ///seguimiento de residente






require __DIR__.'/auth.php';
