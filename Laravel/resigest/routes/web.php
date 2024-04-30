<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('/idioma/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'es'])) {
        abort(403,'NO IDIOMA');
    }
    App::setLocale($locale);

    $localee = App::currentLocale();
        //return view('test',['locale'=>$localee]);
  return redirect()->back();

})->name('idiom');

Route::get('/', function () {
    return view('welcome'); //inicio de laravel, hacemos que la pagina raiz deveulva la bista login
})->name('inicio');

Route::get('/dashboard', function () {//ruta al dashboarda
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {//rutas accesibles solo si estas autenticado el usuriao, editar actualizar y borrar perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

});

Route::get('product', 'ProductController@index')->name('product.index');
Route::get('product/id={product?}', 'ProductController@show')->name('product.show'); ///////////////////////////////////////////////////////////
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product/{product?}', 'ProductController@store')->name('product.store');
Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('product/{product}', 'ProductController@update')->name('product.update');
Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');

require __DIR__ . '/auth.php'; //esto es una ruta de archivo del mismo directorio, es como tener todo el fichero en una línea, lo crea breeze.
