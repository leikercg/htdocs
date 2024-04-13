<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Departamento7Middleware;
use App\Http\Controllers\FamiliarController;

Route::middleware('guest')->group(function () {
    //elimnamos las rutas de registro para que no se puedan crear usuarios independientemente
    //las creamos y usamos directamente aqui importanto la clase.

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});
///rutas de creacion de usuarios
Route::middleware([Departamento7Middleware::class])->group(function () {//usamos el middlewere creado, solo los admin tendran acceso a esta ruta
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('familiar_empleado', [RegisteredUserController::class, 'elegir'])->name('familiar_empleado'); // para elegir entre empleado y familiar
    //modificar
    Route::get('familiar', [FamiliarController::class, 'create'])->name('crear.familiar'); //formulario de creación de familiares
    Route::get('empleado', [EmpleadoController::class, 'create'])->name('crear.empleado'); //formulario de creación de familiares

    Route::get('empleado/{id}', [EmpleadoController::class, 'edit'])->name('editar.empleado'); //lanzar formulario de edición
    Route::put('empleado/{id}', [EmpleadoController::class, 'update'])->name('actualizar.empleado'); //actualizar empleado
    Route::get('familiar/{id}', [FamiliarController::class, 'edit'])->name('editar.familiar'); //lanzar formulario de edición
    Route::put('familiar/{id}', [FamiliarController::class, 'update'])->name('actualizar.familiar'); //actualizar familiar

    //NO HACE FALTA RUTAS DE CREACION DE EMPLEADOS Y FAMILIARES POR QUE SE CREAR EN LA MISMA RUTA QUE EL USUARIO

});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
