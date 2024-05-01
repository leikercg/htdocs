<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::middleware('localization')->group(function () { //usamos el middleware para establecer localization en todas las rutas
    Route::get('/idioma/{locale}', function (string $locale) {
        if (!in_array($locale, ['en', 'es'])) {//si no esta entre esos da error
            abort(403, 'NO IDIOMA');
        }
        session()->put('locale', $locale); //previamente en el middleware se establece en la variable de sesión 'locale' el valor 'es' o 'en'
        $localee = App::currentLocale(); //para pruebas
        // return view('dashboard');
        return redirect()->back(); //nos devuelve a la página con el idioma cambiado
    })->name('idiom');

    Route::get('/', function () {
        if(auth()->check()) { //si esta un usuario autenticado enviar a la lista de residentes
            return redirect()->route('lista.residentes');
        }
        return view('auth.login'); //si no enviar al login
    });

    Route::middleware('auth')->group(function () {//rutas accesibles solo si estas autenticado el usuriao, editar actualizar y borrar perfil
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    });

});

//Route::get('/dashboard', function () { return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard'); la anulamos

Route::get('product', 'ProductController@index')->name('product.index');
Route::get('product/id={product?}', 'ProductController@show')->name('product.show'); ///////////////////////////////////////////////////////////
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product/{product?}', 'ProductController@store')->name('product.store');
Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('product/{product}', 'ProductController@update')->name('product.update');
Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');

require __DIR__ . '/auth.php'; //esto es una ruta de archivo del mismo directorio, es como tener todo el fichero en una línea, lo crea breeze.
