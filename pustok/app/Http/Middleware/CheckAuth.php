<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Kullanıcı zaten giriş yapmışsa, istediğiniz bir yere yönlendirilebilir
            return redirect()->route('client.account.index');
        }

        return $next($request);
    }
}
