<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Familiar;
use App\Models\Familiar_Residente_;
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

        $request->validate([ //si da no valida todos devuelve al formulario con una variable $errors que muestra los errores
            'dni'          => ['required', 'string', 'size:9','unique:' . User::class], //verificar que no exita ese dni en la tabla de users
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password'     => ['required', 'confirmed', Rules\Password::defaults()],
            'departamento' => ['required', 'numeric', 'integer', 'between:1,7'],
        ]);

        if($request->departamento ==6){//si es del daparetamento 6, es decir, un familiar, este campo es obligatorio
            $request->validate([
                'residente' => ['required'],
            ]);
        }

        $user = User::create([ //metodo fillable
            'dni'             => $request->dni,
            'name'            => $request->name,
            'email'           => $request->email,
            'departamento_id' => $request->departamento,
            'password'        => Hash::make($request->password),
        ]);
        if($request->departamento > 0 && $request->departamento < 6) {//si el usuario es empleado ademas crea un emplead
            $empleado                  = new Empleado(); //usamos esto por que no esta definidos fillables los campos
            $empleado->dni             = $request->dni;
            $empleado->nombre          = $request->name;
            $empleado->apellidos       = $request->apellidos;
            $empleado->direccion       = $request->direccion;
            $empleado->telefono        = $request->telefono;
            $empleado->departamento_id = $request->departamento;
            $empleado->save();

            event(new Registered($user));//otros eventos de registrar, como mandar correo de confirmación

            //  Auth::login($user); comentamos esto para que no se inicie sesion al crear un usuario

        }else{//crea un familiar si no es empleado
            $familiar                  = new Familiar(); //usamos esto por que no esta definidos fillables los campos
            $familiar->dni             = $request->dni;
            $familiar->nombre          = $request->name;
            $familiar->apellidos       = $request->apellidos;
            $familiar->direccion       = $request->direccion;
            $familiar->telefono        = $request->telefono;
            $familiar->departamento_id = $request->departamento;
            $familiar->save();

            $familiar_residente = new Familiar_Residente_();
            $familiar_residente->familiar_id = $familiar->id;
            $familiar_residente->residente_id = $request->residente;

            $familiar_residente->save();


            event(new Registered($user));//otros eventos de registrar, como mandar correo de confirmación

        }
        return redirect(route('familiar_empleado'))->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito;
    }

    public function elegir()//esto nos envia la vista de gestion de usuarios para crear, o modificar usuarios de diferentes tipos
    {
        // Empleado del 1 al 5 ordenados por estado, apellido y nombre
        $empleados = Empleado::whereBetween('departamento_id', [1, 5])->orderBy('estado')->orderBy('apellidos')->orderBy('nombre')->get();


        // Obtener los usuarios familiares (departamento_id 6) ordenados por apellido y nombre
        $familiares = Familiar::where('departamento_id', 6)->orderBy('apellidos')->orderBy('nombre')->get();

        return view('gerente.familiar_empleado', ['empleados' => $empleados, 'familiares' => $familiares]);
    }
}
