<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\DomainHit;
use App\Models\DomainVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomainStatisticsController extends Controller
{
    public function index()
    {
        return view('admin.domain-statistics.index');
    }

    public function countVisit()
    {
        $sql = DomainVisit::query()->selectRaw("domain_id, count(*) count")->orderByDesc('count')->groupBy('domain_id')->toSql();
        $visits = DB::table(DB::raw("({$sql}) g"))->select('g.*', 'domains.domain')->leftJoin('domains', 'domains.id', '=', 'g.domain_id')->simplePaginate(20);

        return response()->json($visits);
    }

    public function countHit()
    {
        $sql = DomainHit::query()->selectRaw("domain_id, sum(times) times")->orderByDesc('times')->groupBy('domain_id')->toSql();
        $hits = DB::table(DB::raw("({$sql}) g"))->select('g.*', 'domains.domain')->leftJoin('domains', 'domains.id', '=', 'g.domain_id')->simplePaginate(20);

        return response()->json($hits);
    }
}
