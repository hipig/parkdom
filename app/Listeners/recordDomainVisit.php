<?php

namespace App\Listeners;

use App\Events\DomainVisited;
use App\Services\DomainService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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

        (new DomainService())->recordVisit($domain, $host, $ip);
    }
}
