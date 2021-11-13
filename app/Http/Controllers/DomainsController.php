<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainsController extends Controller
{
    public function show(Domain $domain)
    {
        return view('domains.show', compact('domain'));
    }
}
