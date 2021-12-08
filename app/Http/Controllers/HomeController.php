<?php

namespace App\Http\Controllers;

use App\Events\DomainVisited;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request, Domain $bindDomain)
    {
        $host = $request->getHost();
        $ip = $request->ip();

        $appHost = parse_url(config('app.url'));
        if (!Str::contains($host, $appHost)) {
            event(new DomainVisited($bindDomain, $host, $ip));

            return view('domains.show', ['domain' => $bindDomain]);
        }

        return  view('home.landing');
    }
}
