<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomainVisit;
use Illuminate\Http\Request;

class DomainVisitsController extends Controller
{
    public function index()
    {
        $visits = DomainVisit::query()->latest()->paginate();

        return view('admin.domain-visits.index', compact('visits'));
    }
}
