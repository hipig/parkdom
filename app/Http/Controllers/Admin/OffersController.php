<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offer::query()->with('domain')->latest()->paginate();

        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {

    }
}
