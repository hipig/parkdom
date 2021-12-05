<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DomainVisitExport;
use App\Http\Controllers\Controller;
use App\ModelFilters\Admin\DomainVisitFilter;
use App\Models\Domain;
use App\Models\DomainVisit;
use Illuminate\Http\Request;

class DomainVisitsController extends Controller
{
    public function index(Request $request)
    {
        $domains = Domain::query()->latest()->get();
        $devices = DomainVisit::query()->distinct()->pluck('device');
        $platforms = DomainVisit::query()->distinct()->pluck('platform');
        $browsers = DomainVisit::query()->distinct()->pluck('browser');

        $visits = DomainVisit::filter($request->all(), DomainVisitFilter::class)->latest()->paginate();
        return view('admin.domain-visits.index', compact('visits', 'domains', 'devices', 'platforms', 'browsers'));
    }

    public function export()
    {
        return (new DomainVisitExport())->download('域名访问记录.xlsx');
    }
}
