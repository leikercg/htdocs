<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Departamento7
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) //handle rescibe la solicitud Request y el next que es el sigueinte paso en la ceadena
    {
        // Verificamos si el usuario pertenece al departamento 7
        if ($request->user() && $request->user()->departamento_id == 7) {
            return $next($request);
        }
        //return redirect()->back();//devolver a la ruta de donde viene ojo con los form mas de una vez

        // Si no pertenece al departamento 7, redirigir a una página de acceso denegado o a cualquier otra página deseada.
        abort(403, 'No eres Admin');//mostrar vista de pagina no atorizada




        //@@@@@@@@@@@@@@@@@@@@@@@@revisar
    }
}
