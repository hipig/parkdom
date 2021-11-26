<?php

namespace App\Listeners;

use App\Events\DomainVisited;
use App\Models\DomainVisit;
use App\Services\DomainService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Jenssegers\Agent\Agent;

class recordDomainVisit
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
     * @param  DomainVisited  $event
     * @return void
     */
    public function handle(DomainVisited $event)
    {
        $domain = $event->getDomain();
        $host = $event->getHost();
        $ip = $event->getIp();

        $agent = new Agent();
        $platform = $agent->platform();
        $platformVersion = $agent->version($platform);
        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);
        $location = geoip($ip);

        $visit = DomainVisit::create([
            'host' => $host,
            'ip' => $ip,
            'country_code' => $location->iso_code,
            'country' => $location->country,
            'device' => $agent->device(),
            'device_type' => $agent->deviceType(),
            'platform' => $platform,
            'platform_version' => $platformVersion,
            'browser' => $browser,
            'browser_version' => $browserVersion,
        ]);
        $visit->domain()->associate($domain);
        $visit->save();
    }
}
