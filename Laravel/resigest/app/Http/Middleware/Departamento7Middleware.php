<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Departamento7Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) //los m
    {
        // Verificamos si el usuario pertenece al departamento 7
        if ($request->user() && $request->user()->departamento_id == 7) {
            return $next($request);
        }

        // Si no pertenece al departamento 7, redirigir a una página de acceso denegado o a cualquier otra página deseada.
        abort(403, 'Unauthorized');
    }
}
