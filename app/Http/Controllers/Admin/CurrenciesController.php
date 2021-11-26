<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CurrencyRequest;
use App\ModelFilters\Admin\CurrencyFilter;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    public function index(Request $request)
    {
        $currencies = Currency::filter($request->all(), CurrencyFilter::class)->paginate();

        return view('admin.currencies.index', compact('currencies'));
    }

    public function create()
    {
        return view('admin.currencies.create');
    }

    public function store(CurrencyRequest $request)
    {
        Currency::create($request->only([
            'code',
            'prefix',
            'status'
        ]));

        return redirect()->route('admin.settings.currencies.index')->with('success', '币种添加成功！');
    }

    public function edit(Currency $currency)
    {
        return view('admin.currencies.edit', compact('currency'));
    }

    public function update(CurrencyRequest $request, Currency $currency)
    {
        $currency->fill($request->only([
            'code',
            'prefix',
            'status'
        ]));
        $currency->save();

        return back()->with('success', '币种编辑成功！');
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();

        return back()->with('success', '币种删除成功！');
    }
}
