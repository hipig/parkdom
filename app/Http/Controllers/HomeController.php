<?php

namespace App\Http\Controllers;

use App\Services\DomainService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, DomainService $service)
    {
        $host = $request->getHost();

        if (!$service->isSameOfAppHost($host)) {

            $domain = $service->saveDomainByHost($host);

            return view('domains.show', compact('domain'));
        }

        return view('home.index');
    }
}
