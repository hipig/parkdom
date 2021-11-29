<?php

namespace App\Http\Controllers;

use App\Events\DomainCreated;
use App\Events\DomainVisited;
use App\Models\Domain;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, Domain $hostDomain)
    {
        $host = $request->getHost();
        $ip = $request->ip();

        event(new DomainVisited($hostDomain, $host, $ip));

        return view('domains.show', ['domain' => $hostDomain]);
    }
}
