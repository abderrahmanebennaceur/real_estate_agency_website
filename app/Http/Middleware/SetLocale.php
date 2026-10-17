<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = array_keys(config('localization.locales'));
        $locale = $request->route('locale');

        if (! is_string($locale) || ! in_array($locale, $supportedLocales, true)) {
            $locale = $request->session()->get('locale', config('app.locale'));
        }

        if (! is_string($locale) || ! in_array($locale, $supportedLocales, true)) {
            $locale = config('app.locale');
        }

        app()->setLocale($locale);
        $request->session()->put('locale', $locale);

        return $next($request);
    }
}
