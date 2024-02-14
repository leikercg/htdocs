<?php

use App\Http\Controllers\HolaController;
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

Route::get('/hola',HolaController::class); //esto llama al metodo __invoque, esto define un controlador invocable

Route::get('/hola/{nombre}', 'HolaController@show') ->name('nombreRuta');

Route::get('/hola/{nombre}/{apellido}', 'HolaController@saludo'); //esta ruta llama al controlador HolaController y ejecuta el metodo saludo

// Forma 4: llamar a una función de un controlador con un parámetro optativo, este tipo de ruta debe estar debajo al ser mas generales
Route::get('/hola/{nombre?}', 'HolaController@show');

?>
