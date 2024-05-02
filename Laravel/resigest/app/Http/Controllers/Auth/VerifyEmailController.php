<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
           // return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
           return redirect()->intended(route('lista.residentes', absolute: false).'?verified=1'); //si ha verificado su email enviar aquí

        }

        if ($request->user()->markEmailAsVerified()) { //si solicita otro correo enviar
            event(new Verified($request->user()));
        }

       // return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        return redirect()->intended(route('lista.residentes', absolute: false).'?verified=1');

    }
}
