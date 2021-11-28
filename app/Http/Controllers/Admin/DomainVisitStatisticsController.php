<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomainVisit;
use Illuminate\Http\Request;

class DomainVisitStatisticsController extends Controller
{
    public function index()
    {
        $countryCount = DomainVisit::query()->selectRaw("country name, count(*) value")->orderBy('value')->whereNotNull('country_code')->groupBy('country_code')->get();

        $deviceCount = DomainVisit::query()->selectRaw("device name, count(*) value")->orderBy('value')->groupBy('name')->get();

        $platformCount = DomainVisit::query()->selectRaw("platform name, count(*) value")->orderBy('value')->groupBy('name')->get();

        $browserCount = DomainVisit::query()->selectRaw("browser name, count(*) value")->orderBy('value')->groupBy('name')->get();

        return view('admin.domain-visit-statistics.index', compact('countryCount', 'deviceCount', 'platformCount', 'browserCount'));
    }
}
