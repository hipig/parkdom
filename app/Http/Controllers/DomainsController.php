<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainsController extends Controller
{
    public function index(Request $request)
    {
        $domains = Domain::latest()->paginate();
        return view('domains.index', compact('domains'));
    }

    public function show(Domain $domain)
    {
        return view('domains.show', compact('domain'));
    }
}
