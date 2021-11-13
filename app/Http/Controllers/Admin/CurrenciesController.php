<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
