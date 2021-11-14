<?php

namespace App\Http\Controllers\Admin;

use App\Events\DomainCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DomainRequest;
use App\Models\Currency;
use App\Models\Domain;
use App\Services\DomainService;
use Illuminate\Http\Request;

class DomainsController extends Controller
{
    public function index(Request $request)
    {
        $domains = Domain::query()->paginate();
        return view('admin.domains.index', compact('domains'));
    }

    public function create(Request $request)
    {
        return view('admin.domains.create');
    }

    public function store(DomainRequest $request, DomainService $service)
    {
        $domain = Domain::create($request->only([
            'domain',
            'logo',
            'estimated_price',
            'currency',
            'seo_title',
            'seo_keywords',
            'seo_description',
        ]));

        $hostInfo = $service->parseHost($domain->domain);
        $domain->fill($hostInfo->only('suffix', 'length')->toArray());
        $domain->save();

        event(new DomainCreated($domain));

        return redirect()->route('admin.domains.index')->with('success', '域名添加成功！');
    }

    public function edit(Request $request, Domain $domain)
    {
        return view('admin.domains.edit', compact('domain'));
    }

    public function update(DomainRequest $request, Domain $domain)
    {
        $domain->fill($request->only([
            'logo',
            'estimated_price',
            'currency',
            'seo_title',
            'seo_keywords',
            'seo_description',
        ]));
        $domain->save();

        return back()->with('success', '域名编辑成功！');
    }
}
