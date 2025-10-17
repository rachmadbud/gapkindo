<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class SetLocaleFromSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Cek cookie locale, kalau tidak ada pakai default 'id'
        $locale = Cookie::get('locale', config('app.locale', 'id'));

        App::setLocale($locale);

        return $next($request);
    }
}
