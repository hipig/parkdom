<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResournce;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    public function index(Request $request)
    {
        $currencies = Currency::query()->where('status', Currency::STATUS_ENABLE)->latest()->get();

        return CurrencyResournce::collection($currencies);
    }
}
