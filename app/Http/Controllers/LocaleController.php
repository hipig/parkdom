<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LocaleController extends Controller
{
    public function update(Request $request)
    {
        $locale = $request->input('locale');

        Cookie::queue('locale', $locale, 60 * 24 * 365);

        if ($user = $request->user()) {
            $user->setLocale($locale);
        }

        return back();
    }
}
