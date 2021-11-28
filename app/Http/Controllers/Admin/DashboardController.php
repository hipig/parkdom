<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\DomainCategory;
use App\Models\DomainVisit;
use App\Models\Offer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $count = [
            'latest_visit' => DomainVisit::query()->whereDate('created_at', now())->count(),
            'latest_offer' => Offer::query()->whereDate('created_at', now())->count(),
            'domain_category' => DomainCategory::query()->count(),
            'domain' => Domain::query()->count(),
        ];

        $latestVisits = DomainVisit::query()->orderByDesc('created_at')->limit(10)->get();
        $latestOffers = Offer::query()->orderByDesc('created_at')->limit(10)->get();

        return view('admin.dashboard.index', compact('count', 'latestVisits', 'latestOffers'));
    }
}
