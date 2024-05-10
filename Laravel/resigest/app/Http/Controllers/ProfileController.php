<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Empleado;
use App\Models\Familiar;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse // Método para accualizar información del usuario
    {
        $request->user()->fill($request->validated()); //Valida los datos

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        if(isset(auth()->user()->empleado)) {//si esta establecido un empleado o admin hacer esto

            if(auth()->user()->empleado->id != 7) {//si no es admin actualizar telefono y dirección, ya que admin no tiene dirección
                $empleado = Empleado::find(auth()->user()->empleado->id);

                $empleado->telefono  = $request->telefono;
                $empleado->direccion = $request->direccion;
                $empleado->save();
            }

        } else {//si no es un familiar
            $familiar = Familiar::find(auth()->user()->familiar->id);

            $familiar->telefono  = $request->telefono;
            $familiar->direccion = $request->direccion;
            $familiar->save();
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated')->with('success', __('mensaje.exito')); // adjuntamos datos de sesion flash que solo duran ua solicitud, enviaos el mensaje de exito;
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse // Método para borrar cuenta propia (Nos disponible en nuestra aplicación)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
