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
use App\Http\Controllers\EmpleadoController; //EXPORTAR LAS CLASES
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\CuraController;
use App\Http\Controllers\SesionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\ProfileController;

Route::middleware('guest')->group(function () {
    //elimnamos las rutas de registro para que no se puedan crear usuarios independientemente (las pasamos al grupo de middleware de admin (7)).

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

//DEPARTAMENTO ADMINISTRACIÓN

Route::middleware(['departamento_7', 'auth'])->group(function () {//usamos el middlewere creado y el predefinido auth (nos envia al login si no hay usuario autenticado), solo los admin tendran acceso a esta ruta

    ///rutas de creacion de usuarios
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); //ruta de borrado de cuenta, solo realizable por el admin

    Route::get('empleado/busqueda', [EmpleadoController::class, 'buscar'])->name('buscar.empleado'); /// empleado por filtro de búsquda
    Route::get('familiar/busqueda', [FamiliarController::class, 'buscar'])->name('buscar.familiar'); ///familiar por filtro de búsquda

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

    Route::delete('familiar/delete/{id}', [FamiliarController::class, 'destroy'])->name('borrar.familiar'); //borrar familiar
    //NO HACE FALTA RUTAS DE CREACION DE EMPLEADOS Y FAMILIARES POR QUE SE CREAR EN LA MISMA RUTA QUE EL USUARIO

    //CREACIÓN DE RESIDENTES:
    Route::get('residente/crear', [ResidenteController::class, 'create'])->name('crear.residente'); //formulario de creación de residente
    Route::post('residente/{id?}', [ResidenteController::class, 'store'])->name('almacenar.residente'); //almacenar residente
    Route::get('residente/{id}', [ResidenteController::class, 'edit'])->name('editar.residente'); //lanzar formulario de edición
    Route::put('residente/{id}', [ResidenteController::class, 'update'])->name('actualizar.residente'); //actualizar residente
    Route::get('lista_residentes_completa', [ResidenteController::class, 'indexBajas'])->name('lista.completa.residentes'); ///lista de residentes con bajas incluidas
    Route::get('lista_residentes/bajas/busqueda', [ResidenteController::class, 'buscarBajas'])->name('buscar.residente.bajas'); ///ficha de residente por filtro de búsquda en baja

});

//DEPARTAMENTO MEDICINA

Route::middleware(['departamento_1', 'auth', 'verified'])->group(function () {//usamos el middlewere creado y el predefinido auth (nos envia al login si no hay usuario autenticado), solo los admin tendran acceso a esta ruta

    //////////////////////////////// Rutas de medicos///////////////////////////////
    Route::get('residente/visitas/{residente_id}', [VisitaController::class, 'show'])->name('visitas.residente');
    Route::get('residente/visitas/{id}/{residente_id}', [VisitaController::class, 'edit'])->name('editar.visita'); //lanzar formulario de edición
    Route::put('residente/visita/{id}', [VisitaController::class, 'update'])->name('actualizar.visita'); //actualizar visita
    Route::get('visita/{residente_id}', [VisitaController::class, 'create'])->name('crear.visita'); //formulario de creación de vistas
    Route::post('visita/{id?}', [VisitaController::class, 'store'])->name('almacenar.visita'); //crea la visita
    Route::delete('visita/{id}', [VisitaController::class, 'destroy'])->name('borrar.visita'); //borrar visita

});

//DEPARTAMENTO ENFERMERÍA

Route::middleware(['departamento_2', 'auth'])->group(function () {//usamos el middlewere creado y el predefinido auth (nos envia al login si no hay usuario autenticado), solo los admin tendran acceso a esta ruta

    //////////////////////////////// Rutas de enfermeros///////////////////////////////

    //---------------------------CURAS---------------------------------

    Route::get('residente/cura/{residente_id}', [CuraController::class, 'show'])->name('curas.residente');
    Route::get('residente/cura/{id}/{residente_id}', [CuraController::class, 'edit'])->name('editar.cura'); //lanzar formulario de edición
    Route::put('residente/cura/{id}', [CuraController::class, 'update'])->name('actualizar.cura'); //actualizar cura
    Route::get('cura/{residente_id}', [CuraController::class, 'create'])->name('crear.cura'); //formulario de creación de curas
    Route::post('cura/{id?}', [CuraController::class, 'store'])->name('almacenar.cura'); //crea la cura
    Route::delete('cura/{id}', [CuraController::class, 'destroy'])->name('borrar.cura'); //borrar cura
    //---------------------------TAREAS---------------------------------

    Route::get('residente/tareas/{residente_id}', [TareaController::class, 'show'])->name('tareas.residente');
    Route::get('residente/tareas/{residente_id}/crear', [TareaController::class, 'create'])->name('crear.tarea'); //formulario de creación de grupos de trabajo
    Route::post('tarea/{id?}', [TareaController::class, 'store'])->name('almacenar.tarea'); //crea la tarea
    Route::get('tarea/{id}/editar', [TareaController::class, 'edit'])->name('editar.tarea'); //lanzar formulario de edición
    Route::put('tarea/{id}', [TareaController::class, 'update'])->name('actualizar.tarea'); //actualizar tarea
    Route::delete('tarea/borrar/{id}/{residente_id}', [TareaController::class, 'destroy'])->name('borrar.tarea'); //borrar grupo

});

//DEPARTAMENTO FISIOTERAPIA

Route::middleware(['departamento_3', 'auth'])->group(function () {//usamos el middlewere creado y el predefinido auth (nos envia al login si no hay usuario autenticado), solo los admin tendran acceso a esta ruta

    //////////////////////////////// Rutas de fisioterapeutas///////////////////////////////

    Route::get('residente/sesion/{residente_id}', [SesionController::class, 'show'])->name('sesiones.residente');
    Route::get('residente/sesion/{id}/{residente_id}', [SesionController::class, 'edit'])->name('editar.sesion'); //lanzar formulario de edición
    Route::put('residente/sesion/{id}', [SesionController::class, 'update'])->name('actualizar.sesion'); //actualizar sesion
    Route::get('sesion/{residente_id}', [SesionController::class, 'create'])->name('crear.sesion'); //formulario de creación de vistas
    Route::post('sesion/{id?}', [SesionController::class, 'store'])->name('almacenar.sesion'); //crea la sesion
    Route::delete('sesion/{id}', [SesionController::class, 'destroy'])->name('borrar.sesion'); //borrar sesion

});

//DEPARTAMENTO TERAPIA

Route::middleware(['departamento_4', 'auth'])->group(function () {//usamos el middlewere creado y el predefinido auth (nos envia al login si no hay usuario autenticado), solo los admin tendran acceso a esta ruta

    //////////////////////////////// Rutas de terapeutas ///////////////////////////////

    Route::get('grupo/crear', [GrupoController::class, 'create'])->name('crear.grupo'); //formulario de creación de grupos de trabajo
    Route::get('grupo', [GrupoController::class, 'index'])->name('lista.grupos'); //ver todos los grupos
    Route::post('grupo/{id?}', [GrupoController::class, 'store'])->name('almacenar.grupo'); //crea la grupo
    Route::get('grupo/{id}/editar', [GrupoController::class, 'edit'])->name('editar.grupo'); //lanzar formulario de edición
    Route::put('grupo/{id}', [GrupoController::class, 'update'])->name('actualizar.grupo'); //actualizar grupo
    Route::delete('grupo/{id}', [GrupoController::class, 'destroy'])->name('borrar.grupo'); //borrar grupo
    Route::get('grupoResidente/{id}/{residente_id}', [GrupoController::class, 'destroyPivot'])->name('borrar.pivot'); //borrar la relación de un residente con el grupo, es decir, sacarlo del grupo
    Route::get('grupo/residente/{residente_id}', [GrupoController::class, 'gruposResidente'])->name('residente.grupos'); //ver todos los grupos de residente

});

//DEPARTAMENTO ASISTENCIA

Route::middleware(['departamento_5', 'auth'])->group(function () {//usamos el middlewere creado y el predefinido auth (nos envia al login si no hay usuario autenticado), solo los admin tendran acceso a esta ruta

    //////////////////////////////// Rutas de auxiliares ///////////////////////////////

    Route::get('tareas/{id}', [TareaController::class, 'showAuxiliar'])->name('auxiliar.tareas');

});

//DEPARTAMENTO FAMLIAR

Route::middleware(['departamento_6', 'auth'])->group(function () {//usamos el middlewere creado y el predefinido auth (nos envia al login si no hay usuario autenticado), solo los admin tendran acceso a esta ruta

    //////////////////////////////// Rutas de auxiliares ///////////////////////////////

    Route::get('lista_residentes_familiar', [ResidenteController::class, 'indexFamiliar'])->name('lista.residentesFamiliar'); ///lista de residentes

});

///////RUTAS COMUNES QUE NECESITAN AUTENTICACIÓN Y ESTAR VALIDADADO EL CORREO////////////////////
Route::middleware(['verified', 'auth'])->group(function () {//usamos los middleware predefinidos, auth (nos envia al login si no hay usuario autenticado) y verified (comprueba que el usuario haya verificado su correo)

    /////////RUTAS USABLES POR TODOS LOS USUARIOS///////////
    Route::get('segumiento_residente/{id}/{departamento_id}', [SeguimientoController::class, 'show'])->name('seguimiento.residente'); ///seguimiento de residente
    Route::get('seguimiento/editar/{id}/{departamento_id}', [SeguimientoController::class, 'edit'])->name('editar.seguimiento'); //lanzar formulario de edición de segumiento
    Route::put('segumiento/{id}', [SeguimientoController::class, 'update'])->name('actualizar.seguimiento'); //actualizar grupo

    Route::get('lista_residentes', [ResidenteController::class, 'index'])->name('lista.residentes'); ///lista de residentes
    Route::get('ficha_residente/{id}', [ResidenteController::class, 'show'])->name('ficha.residente'); ///ficha de residente
    Route::get('itinerario/{id}', [ResidenteController::class, 'itinerario'])->name('itinerario.residente'); ///itinerario de residente
    Route::get('lista_residentes/busqueda', [ResidenteController::class, 'buscar'])->name('buscar.residente'); ///ficha de residente por filtro de búsquda

});

Route::middleware('auth')->group(function () { //lista de rutas solo accesibles si esta autenticado un usuario, en caso contrario envia a la ruta de login

    ////RUTAS DEFINIDAS DE AUTH/////
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice'); //nos avisa de que debemos verificar el correo

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify'); //al pulsar el enlace del correo se confirma la verificación

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send'); //reenviar el correo de verificación

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
