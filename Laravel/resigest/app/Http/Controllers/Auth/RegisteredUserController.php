<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'dni' => ['required', 'string', 'size:9'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'dni' => $request->dni,
            'name' => $request->name,
            'email' => $request->email,
            'id_departamento'=>$request->departamento,
            'password' => Hash::make($request->password),
        ]);


        $empleado=new Empleado();
        $empleado->id=$request->dni;
        $empleado->Nombre=$request->name;
        $empleado->Apellidos=$request->apellidos;
        $empleado->Direccion=$request->direccion;
        $empleado->Telefono=$request->telefono;
        $empleado->Id_departamento=$request->departamento;
        $empleado->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
