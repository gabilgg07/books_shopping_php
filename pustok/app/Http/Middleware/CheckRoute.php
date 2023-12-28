<?php

namespace App\Http\Middleware;

use App\Models\Lang;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class CheckRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeLang = Str::before($request->path(), '/');
        $hasLang = Lang::where('is_deleted', 0)->where('is_active', 1)->where('code', $routeLang)->first();

        if (strlen($routeLang) == 2 && !$hasLang) {
            $acceptedLanguages = $request->getLanguages();
            $supportedLanguages = Lang::where('is_deleted', 0)->where('is_active', 1)->pluck('code')->toArray();
            foreach ($acceptedLanguages as $acceptedLanguage) {
                if (in_array($acceptedLanguage, $supportedLanguages)) {
                    App::setLocale($acceptedLanguage);
                    $redirect = Str::replace($routeLang, $acceptedLanguage, $request->path());
                    return redirect($redirect);
                }
            }
        }
        return $next($request);
    }
}
