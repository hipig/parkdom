<?php

namespace App\Listeners;

use App\Mail\OfferNotification;
use App\Settings\OfferSetting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $offer = $event->getOffer();

        $offerSetting = app(OfferSetting::class);

        if ($offerSetting->is_notify == 1 && !empty($offerSetting->notify_email)) {
            Mail::to($offerSetting->notify_email)->send(new OfferNotification($offer));
        }

        $offer->is_noticed = true;
        $offer->save();
    }
}
