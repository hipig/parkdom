<?php

namespace App\Http\Controllers;

use App\Events\DomainCreated;
use App\Events\DomainVisited;
use App\Models\Domain;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $host = $request->getHost();
        $ip = $request->ip();

        $domainName = parseHost($host, 'domain');

        try {
            $domain = Domain::query()->where('domain', $domainName)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $domain = Domain::create(['domain' => $domainName]);

            event(new DomainCreated($domain));
        }

        event(new DomainVisited($domain, $host, $ip));

        return view('domains.show', compact('domain'));
    }
}
