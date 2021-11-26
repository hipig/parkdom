<?php

namespace App\Http\Controllers;

use App\Services\DomainService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request, DomainService $service)
    {
        $host = $request->getHost();
        $ip = $request->ip();

        if (!$service->isSameOfAppHost($host)) {

            $domain = $service->storeDomain($host, $ip);

            return view('domains.show', compact('domain'));
        }

        return redirect()->route('admin.dashboard');
    }
}
