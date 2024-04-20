<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([ //registrat nombres para no tener que usar la clase
            'departamento_7' => \App\Http\Middleware\Departamento7::class,
            'departamento_1' => \App\Http\Middleware\Departamento1::class,
            'departamento_2' => \App\Http\Middleware\Departamento2::class,
            'departamento_3' => \App\Http\Middleware\Departamento3::class,
            'departamento_4' => \App\Http\Middleware\Departamento4::class,
            'departamento_5' => \App\Http\Middleware\Departamento5::class,
            'departamento_6' => \App\Http\Middleware\Departamento6::class,


        ]);
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
