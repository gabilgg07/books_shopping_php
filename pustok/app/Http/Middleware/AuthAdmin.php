<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()) {
            if (auth()->user()->is_admin) {
                return $next($request);
            } else {
                return redirect()->route('client.account.index');
            }
        } else {
            return redirect()->route('auth.signin');
        }
    }
}