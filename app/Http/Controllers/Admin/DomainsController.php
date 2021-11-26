<?php

namespace App\Http\Controllers\Admin;

use App\Events\DomainCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BatchCreateDomainRequest;
use App\Http\Requests\Admin\CreateDomainRequest;
use App\ModelFilters\Admin\DomainFilter;
use App\Models\Currency;
use App\Models\Domain;
use App\Services\DomainService;
use App\Settings\DomainSetting;
use Illuminate\Http\Request;

class DomainsController extends Controller
{
    public function index(Request $request)
    {
        $domains = Domain::filter($request->all(), DomainFilter::class)->latest()->paginate();
        return view('admin.domains.index', compact('domains'));
    }

    public function create(Request $request, DomainSetting $setting)
    {
        return view('admin.domains.create', compact('setting'));
    }

    public function store(CreateDomainRequest $request)
    {
        $domains = $request->input('domains');
        foreach ($domains as $value) {
            $input = $request->only([
                'price',
                'min_price',
                'currency',
                'can_offer',
            ]);
            $input['domain'] = $value;
            $domain = Domain::create($input);

            event(new DomainCreated($domain));
        }

        return redirect()->route('admin.domains.index')->with('success', '域名添加成功！');
    }

    public function edit(Request $request, Domain $domain)
    {
        $themes = \Theme::all();
        return view('admin.domains.edit', compact('domain', 'themes'));
    }

    public function update(Request $request, Domain $domain)
    {
        $domain->fill($request->only([
            'description',
            'currency',
            'price',
            'seo_title',
            'seo_keywords',
            'seo_description',
        ]));
        $domain->save();

        return back()->with('success', '域名编辑成功！');
    }

    public function destroy(Domain $domain)
    {
        $domain->delete();

        return back()->with('success', '域名删除成功！');
    }
}
