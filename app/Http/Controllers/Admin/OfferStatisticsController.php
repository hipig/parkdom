<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferStatisticsController extends Controller
{
    public function index()
    {
        $monthlyCount = Offer::query()->selectRaw("date_format(created_at,'%Y-%m') month, count(*) count")->orderBy('month')->groupBy('month')->pluck('count', 'month');

        $monthlyPrice = Offer::query()->selectRaw("date_format(created_at,'%Y-%m') month, sum(offer_price) amount")->orderBy('month')->groupBy('month')->pluck('amount', 'month');

        return view('admin.offer-statistics.index', compact('monthlyCount', 'monthlyPrice'));
    }
}
