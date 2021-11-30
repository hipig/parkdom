<?php

namespace App\Http\Controllers;

use App\Events\DomainCreated;
use App\Events\DomainVisited;
use App\Models\Domain;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, Domain $bindDomain)
    {
        $host = $request->getHost();
        $ip = $request->ip();

        event(new DomainVisited($bindDomain, $host, $ip));

        return view('domains.show', ['domain' => $bindDomain]);
    }
}
