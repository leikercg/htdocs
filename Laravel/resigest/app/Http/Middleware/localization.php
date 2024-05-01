<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response //debemos usar este middleware en todas las rutas ya que laravel solo deja cambiar el idioma en una solicitud.
    {
        if(session()->has('locale')){
            App::setLocale(Session()->get('locale'));//establecemos el idioma en una variable de sesión, para poder consultarla y modificarla siempre usemos este middleware
        }
        return $next($request);
    }
}
