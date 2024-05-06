<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Empleado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse //Método que inicia sesión
    {
        $request->authenticate();//se autentifica

        $departamento = auth()->user()->departamento_id;
        if (in_array($departamento, [1, 2, 3, 4, 5])) { //Si no es admin o familiar no entra aquí
            $empleadoId=auth()->user()->empleado->id;
            $empleado = Empleado::find($empleadoId); // Buscamos el usuario
            if ($empleado->estado == "baja") { // En caso de estar dado de baja
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/')->with('error', __('mensaje.login')); // Enviamos al inicio con el mensaje de que ya no puede acceder
            }
        }

        $request->session()->regenerate();

        //return redirect()->intended(route('dashboard', absolute: false));//anulamos esta ruta despues de iniciar sesión
        return redirect()->route('lista.residentes'); //indicamos esta ruta al iniciar sesión

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse //Método que cierra sesión
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
