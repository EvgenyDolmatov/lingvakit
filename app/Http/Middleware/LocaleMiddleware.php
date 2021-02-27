<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $settings = Auth::user()->setting;

        // Set Site Language by User Settings
        if (Auth::check() && $settings && in_array($settings->locale, ['en', 'ru'])) {
            App::setLocale($settings->locale);
        }

        return $next($request);
    }
}
