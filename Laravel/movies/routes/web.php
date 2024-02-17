<?php

use App\Http\Controllers\MovieController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('index', "MovieController@mostrar") ->name('mostrar');

/*se debe nombras las vista igual que el los metodos cuando es resource*/
Route::get('index', [MovieController::class,"index"]) ->name('mostrar');

//Route::get('index', [MovieController::class,"index"]) ->name('mostrar');

Route::get('index/peliculas/{id}',[MovieController::class,'show'])->name('pelicula');

Route::get('index/genero/{genero}',[MovieController::class,'genero'])->name('genero');

Route::get('index/fecha/{fecha}',[MovieController::class,'novedades'])->name('novedades');

Route::get('index/director',[MovieController::class,'director'])->name('director');

Route::get('index/titulo',[MovieController::class,'titulo'])->name('titulo');


