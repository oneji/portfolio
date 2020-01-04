<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Determine browser's locale
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        if($lang === 'ru') {
            \App::setLocale('ru');
        } else {
            \App::setLocale('en');
        }

        return $next($request);
    }
}
