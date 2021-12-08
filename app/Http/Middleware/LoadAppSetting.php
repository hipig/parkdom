<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class LoadAppSetting
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
        // Set the app's default locale
        $languages = Language::enable()->get();
        foreach ($languages as $language) {
            if ($language->default) {
                config(['app.locale' => $language->code]);
            }

            config(['app.locales.' . $language->code => $language->name]);
        }

        return $next($request);
    }
}
