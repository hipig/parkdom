<?php

namespace App\Http\Controllers\Api;

use App\Events\OfferSubmitted;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OfferRequest;
use App\Http\Resources\OfferResource;
use App\Models\Domain;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function store(OfferRequest $request, Domain $domain)
    {
        $offer = Offer::create($request->only([
            'name',
            'email',
            'phone',
            'offer_price',
            'content',
        ]));
        $offer->domain()->associate($domain);
        $offer->ip = $request->ip();
        $offer->save();

        event(new OfferSubmitted($offer));

        return OfferResource::make($offer);
    }
}
