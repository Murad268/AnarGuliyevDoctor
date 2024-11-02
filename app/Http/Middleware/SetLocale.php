<?php

namespace App\Http\Middleware;

use App\Models\Lang;
use Closure;
use Illuminate\Support\Facades\Cache;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Check if the locale is already cached
        if (!Cache::has('app_locale')) {
            // Retrieve the main language code
            $locale = 'az';

            // Cache the locale code
            Cache::put('app_locale', $locale, now()->addDay()); // Cache for 1 day or adjust as needed
        } else {
            // Retrieve the cached language code
            $locale = Cache::get('app_locale');
        }

        // Set the application locale
        app()->setLocale($locale);

        return $next($request);
    }
}
