<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdminCheck
{
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {
            if (Auth::guard($guard)->user()->is_admin) {
                return redirect()->route('manager.dashboard');
            } else {
                return redirect()->route('client.account.index');
            }
        }

        return $next($request);
    }
}