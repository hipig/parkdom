<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResournce;
use App\ModelFilters\Admin\CurrencyFilter;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    public function index(Request $request)
    {
        $currencies = Currency::filter($request->all(), CurrencyFilter::class)->get();

        return CurrencyResournce::collection($currencies);
    }
}
