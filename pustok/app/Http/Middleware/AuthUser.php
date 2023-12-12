<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()) {
            if (!auth()->user()->is_admin) {
                return $next($request);
            } else {
                return redirect()->route('manager.dashboard');
            }
        } else {
            return redirect()->route('auth.login');
        }
    }
}