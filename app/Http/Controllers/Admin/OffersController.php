<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ModelFilters\Admin\OfferFilter;
use App\Models\Domain;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index(Request $request)
    {
        $domains = Domain::query()->latest()->get();

        $offers = Offer::filter($request->all(), OfferFilter::class)->with('domain')->latest()->paginate();

        return view('admin.offers.index', compact('offers', 'domains'));
    }
}
